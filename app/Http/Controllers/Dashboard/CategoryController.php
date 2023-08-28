<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

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
        $request->validate(['name' => 'required|string|max:255']);
        Category::create(['name' => $request->name]);
        return redirect()->route('categories');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category->update(['name' => $request->name]);
        return redirect()->route('categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
