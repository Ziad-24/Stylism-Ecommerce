<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index()
    {
        $latestProducts = Product::select()->latest()->paginate(4);
        $allCategories = Category::select('id','name')->paginate(3);
        

        return view('user.main',compact('latestProducts' , 'allCategories'));
    }

    public function allLatestProducts()
    {
        $latestProducts = Product::select()->latest()->paginate(20);
        return view('products.latest' , compact('latestProducts'));
    }
}
