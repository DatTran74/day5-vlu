<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        
        return view('category.index', compact('categories'));
    }
    
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'detail' => 'required|max:255|String',
            'is_done' => 'sometimes',
        ]);

        Category::create([
            'name' => $request->name,
            'detail' => $request->detail,
            'is_done' => $request->has('is_done'),
        ]);
        return redirect('/categories') -> with('success', 'Category created successfully');

        
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'detail' => 'required|max:255|string',
            'is_done' => 'sometimes|boolean',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect('categories')->with('status', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('categories')->with('status', 'Category deleted successfully!');
    }
}