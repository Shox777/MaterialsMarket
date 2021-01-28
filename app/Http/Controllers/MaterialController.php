<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Traits\responseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    use responseTrait;

     //* Get all materials with pagination
    public function index(Request $request)
    {
        $materials = Material::paginate(10);
        return $this->successResponse($materials);
    }

    //* Get material by its id
    public function show(Request $request, Material $id)
    {
        return $this->successResponse($id);
    }

    //* Create material with validation
    public function store(Request $request)
    {
        $store = Material::create($this->makeValidaion($request));  
        return $this->successResponse($store); 
    }

    //* Update material by its id
    public function update(Request $request, Material $id)
    {
        $id->update($this->makeValidaion($request));
        return $this->successResponse($id);
    }

    //* Delete material by its id
    public function destroy($id)
    {
        $destoy = DB::table('materials')->where('id', $id)->delete();
        return $this->successResponse($destoy);
    }   

    //* Validation
    public function makeValidaion(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|min:3',
            'price' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value > 999999) {
                        $fail('The ' . $attribute . ' is too big.');
                    }
                },
            ],
        ]);
    }
}
