<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Product $product)
    {
        // no problem with that error

        // auth()->user()->products()->toggle($product->id);
        return auth()->user()->products()->toggle($product->id);
    }


    public function allCart()   
    {
        $products = auth()->user()->products;
        $total=0;
        foreach($products as $product)
        {
            $total += $product->price;
        }
        // return $products;
        return view('user.cart' , compact('products' , 'total'));
    }
}
