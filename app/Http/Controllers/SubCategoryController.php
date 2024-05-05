<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subCategories = SubCategory::with('category')->get();
        return view('management.sub_categories.index', compact(['subCategories', 'categories']));
    }

    public function store(Request $request)
    {
        //  dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:sub_categories',
            'category_id' => 'required|exists:categories,id'
        ]);

        $subCategory = new SubCategory();
        $subCategory->name = $validatedData['name'];
        $subCategory->category_id = $validatedData['category_id'];
        $subCategory->save();

        return redirect()->route('management.sub_categories.index')->with('success', 'Subcategory created successfully.');
    }

    public function edit(SubCategory $subCategory)
    {
        return view('management.sub_categories.edit', compact('subCategory'));
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:sub_categories,name,' . $subCategory->id,
            'category_id' => 'sometimes'
        ]);

        $subCategory->update($validatedData);

        return redirect()->route('management.sub_categories.index')
                         ->with('success', 'Subcategory updated successfully.');
    }

    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();

        return redirect()->route('management.sub_categories.index')
                         ->with('success', 'Subcategory deleted successfully.');
    }
}
