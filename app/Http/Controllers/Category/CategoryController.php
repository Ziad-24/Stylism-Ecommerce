<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAllCategories()
    {
        $categories = Category::select('id','name')->get();
        $counter = 0;
        return view('admin.category.all' , compact('categories' , 'counter'));
    }

    public function createCategories()
    {
        return view('admin.category.create');
    }

    public function storeCategories(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
        ]);
        
        
        return redirect()->route('admin.category.all');
    }

    public function editCategory(Request $request)
    {
          // Offer::findOrFail($offerId);
          $category = Category::find($request -> id);
          if(!$category)
          {
              return response() -> json([
              'status' => false ,
              'message' => 'data not found',
              'id' => $request -> id,
               ]);
          }
        return view('admin.category.edit' , compact('category'));
    }

    public function updateCategory(Request $request)
    {
        $category = Category::find($request -> id);
        if(!$category)
        {
            return response() -> json([
                'status' => false ,
                'message' => 'Category Updating Failed',
                'data' => $request -> id,
            ]);
        }
        
        //update data
        $category->update($request -> all());
        
        return response() -> json([
            'status' => true ,
            'message' => 'Category Updated Successfully',
            'id' => $request -> id,
        ]);
    }

    public function deleteCategory(Request $request)
    {
        $category = Category::find($request -> id);
        if(!$category)
        {
            // add current lines inside the all categories page
            return response() -> json([
                'status' => false ,
                'message' => 'Category removal failed',
                'data' => $request -> id,
            ]);
        }

        $category->products()->delete();
        $category->delete();

        return response() -> json([
            'status' => true ,
            'message' => 'Category Deleted Successfully',
            'id' => $request -> id,
        ]);
    }


    public function getCertainCategory($id)
    {
        $categoryName = Category::where('id' , $id) -> select('name')->get();
        $categoryName = $categoryName[0];
        $products = Product::where('category_id' , $id)->paginate(PAGINATION_COUNT);
        $counter=0;
        return view('admin.category.certain' , compact('products','counter','categoryName'));    
    }

}
