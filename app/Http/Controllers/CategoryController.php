<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category;

        $category->id = $request->id;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->cost = $request->cost;

        $category->save();
        return response()->json(['category' => $category]);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(['categories' => Category::find($id)]);
    
    
    }


    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        $category->id = $request->id;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->cost = $request->cost;

        $category->save();
        return response()->json(['categories' => $category]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json(['categories' => Category::all()]);
    }
}
