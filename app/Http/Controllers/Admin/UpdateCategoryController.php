<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class UpdateCategoryController extends Controller
{
    public function edit(Request $request, Category $category)
    {
        $allCategories = Category::categories()->get(['id', 'name']);
        return view('backend.admin.categories.edit', compact('category', 'allCategories'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => ['required', 'unique:categories,name,'.$category->id],
            'parent' => ['nullable', 'exists:categories,id']
        ]);

        $category->update([
            'name'        => $data['name'],
            'parent_id'   => $data['parent'],
            'is_featured' => $request->is_featured ?? 0,
            'description' => $request->description
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }
}
