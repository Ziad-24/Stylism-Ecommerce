<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts()
    {
        $products = Product::select()->get();
        $products = Product::with(['category' => function($category){
            $category -> select('id' , 'name') -> get();
        }])->get();
        $counter=0;
        return view('admin.product.all' , compact('products','counter'));
    }

    public function deleteProduct(Request $request)
    {
        $product = Product::find($request -> id);
        if(!$product)
        {
            // add current lines inside the all categories page
            return response() -> json([
                'status' => false ,
                'message' => 'Product removal failed',
                'data' => $request -> id,
            ]);
        }

        $product->delete();

        return response() -> json([
            'status' => true ,
            'message' => 'Product Deleted Successfully',
            'id' => $request -> id,
        ]);
    }
}
