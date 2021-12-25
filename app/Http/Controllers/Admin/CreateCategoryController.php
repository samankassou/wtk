<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CreateCategoryController extends Controller
{

    public function create()
    {
        $categories = Category::categories()->paginate(10)->withQueryString();

        return view('backend.admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'unique:categories,name'],
            'parent' => ['nullable', 'exists:categories,id'],
        ]);

        Category::create([
            'name'        => $data['name'],
            'parent_id'   => $data['parent'],
            'is_featured' => $request->is_featured ?? 0,
            'description' => $request->description
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    }
}
