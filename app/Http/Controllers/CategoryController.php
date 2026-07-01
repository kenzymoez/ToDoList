<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = Category::with('task')->get(); 
        $categories = Category::all();
        return response()->json([
            "status"=> "Success",
            "message" => "Categories fetched successfully",
            "data"=> CategoryResource::collection($categories)
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create($request->all());
        return response()->json([
            "status"=> "success",
            "message"=> "Category created successfully"
            ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return response()->json([
        "status"=> "success",
        "message"=> "Category fetched successfully",
        "data"=> new CategoryResource($category)
        ],200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json([
        "status"=> "success",
        "message"=> "Category updated successfully",
        "data"=> $category
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category= Category::findOrFail($id);
        $category->delete();
        return response()->json(null,204);
    }
}
