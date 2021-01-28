<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\responseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use responseTrait;

     //* Get all products with pagination
    public function index(Request $request)
    {
        $materials = Product::paginate(10);
        return $this->successResponse($materials);
    }

    //* Get product by its id
    public function show(Request $request, Product $id)
    {
        return $this->successResponse($id);
    }

    //* Create product with validation
    public function store(Request $request)
    {
        $store = Product::create($this->makeValidaion($request));  
        return $this->successResponse($store); 
    }

    //* Update product by its id
    public function update(Request $request, Product $id)
    {
        $id->update($this->makeValidaion($request));
        return $this->successResponse($id);
    }

    //* Delete product by its id
    public function destroy($id)
    {
        $destoy = DB::table('materials')->where('id', $id)->delete();
        return $this->successResponse($destoy);
    }   

    //* Validation form
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
