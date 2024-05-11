<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('management.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'sometimes|string|max:255',
            'is_featured' => 'sometimes',
        ]);

        // Category::create($validatedData);
        $category = new Category();
        $category->name = $validatedData['name']; // Use array syntax to access the 'name' key
        if($validatedData['description']){
            $category->description = $validatedData['description'];
        }
        if($validatedData['is_featured']){
            $category->is_featured = $validatedData['is_featured'];
        }
        $category->save();
        return redirect()->route('management.categories.index')
                         ->with('success', 'Category created successfully.');

    }

    public function edit(Category $category)
    {
        return view('management.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'sometimes|string|max:255',
            'is_featured' => 'sometimes',
        ]);

        $category->update($validatedData);

        return redirect()->route('management.categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('management.categories.index')
                         ->with('success', 'Category deleted successfully.');
    }
}
