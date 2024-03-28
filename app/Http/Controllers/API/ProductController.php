<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json($product,200);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required',
            'desc' => 'required',
            'created_at' => ''
        ]);
        if ($validator->fails()){
            return response()->json([
                'validate' => 'error'
            ],404);
        }else{
            $product = Product::create($request->all());
            return response()->json([
                'create' => 'success',
                'name product' => $product->name,
                'slug product' => $product->slug,
                'desc product' => $product->desc,
                'created_at' => $product->created_at
            ],200);
        }
    }

    public function show($id){
        $product = Product::findOrFail($id);
        return response()->json($product,200);
    }

    public function destroy($id){
        $product = Product::destroy($id);
        return response()->json([
            'delete product' => 'success',
        ]);
    }
}
