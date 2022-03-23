<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use File;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


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

        
        $path = public_path('storage/').$product->img;
        unlink($path);
        $product->delete();

        return response() -> json([
            'status' => true ,
            'message' => 'Product Deleted Successfully',
            'id' => $request -> id,
        ]);
    }

    public function createProduct()
    {
        $categories = Category::select('id','name')->get();
        return view('admin.product.create' , compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        // dd($request);
        // return $request->photo;
        $data = [];
        $data['photo'] = $request->photo;
        
        $imagepath =  $data['photo']->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagepath}"))->resize(1000,1000);
        $image->save();


        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
            'img' => $imagepath,
            'category_id' => $request->category
        ]);
        
        return redirect()->route('admin.products.all');
    }
}
