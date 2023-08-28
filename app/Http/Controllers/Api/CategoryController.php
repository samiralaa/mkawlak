<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = CategoryResource::collection(Category::get());
        return successResponseData($categorys);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = CategoryResource::make($category);
        return successResponseData($category);
    }
}
