<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct($id)
    {
        $product = Product::find($id);
        $relatedProducts = Product::where('category_id' , $product->category_id)->paginate(8);
        // return $product->category_id;
        return view('products.product' , compact('product' , 'relatedProducts'));
    }
}
