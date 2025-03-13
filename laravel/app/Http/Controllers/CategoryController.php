<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
//-- Get/api/categories
    public function getCategories() 
    
    {
        return response()->json(Category::all());
    }
// --post /api/categories
    public function createCategory()
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = Category::create($request->all());
        return response()->json($category, 201);
    }
//--Get/api/categories/{categoryId}
    public function getCategory($categoryId) {
        return response()->json(Category::findOrFail($categoryId));
    }
//---patch/api/categories/{categoryId}
    public function updateCategory($categoryId){
        $category = Category::findOrFail($categoryId);
        $request->validate([
            'name' => 'sometimes|string|max:255'
        ]);

        $category->update($request->all());
        return response()->json($category);
    }

//---Delete/api/categories/{categoryId}
    public function deleteCategory($categoryId){
        $category = Category::findOrFail($categoryId);
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}

    

    

