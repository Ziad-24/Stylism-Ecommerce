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

    public function allProducts()
    {
        // needs a view
        $products = Product::select()->simplepaginate(20);
        // return $products;
        return view('products.all' , compact('products'));
    }
    
    public function productsInCategoryFromAProduct($id)
    {
        $product = Product::find($id);
        $category = Category::select()->where('id' , $product->id)->get();
        $category = $category[0];
        $products = Product::where('category_id' , $product->category_id)->simplepaginate(20);
        return view('category.certaincategory' , compact('products' , 'category'));
    }

    public function productsInCategoryFromACategory($id)
    {
        $category = Category::select()->where('id' , $id)->get();
        $category = $category[0];
        $products = Product::where('category_id' ,$id)->simplepaginate(20);
        return view('category.certaincategory' , compact('products' , 'category'));
    }


    public function allCategories()
    {
        // seperate women from men
        $menCategories = Category::where('name' , 'like' , 'Men%')->get();
        $womenCategories = Category::where('name' , 'like' , 'Women%')->get();
        
        return view('category.all' , compact('menCategories','womenCategories'));
    }
}
