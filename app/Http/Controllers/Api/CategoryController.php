<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\StoreCategoryRequest;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return  CategoryResource::collection(Category::select('id','name')->get())  ;
    }
    public function index_2()
    {
        //
        return Category::select('id','name')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $category =  auth()->user()->categories()->create($request->validated());
        return  new  CategoryResource( $category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        return  new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        //
       $category->update($request->validated());
       return  new CategoryResource($category) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return  response()->noContent();
    }
}
