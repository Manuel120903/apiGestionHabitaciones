<?php

namespace App\Http\Controllers;

use App\Models\Bedrooms;
use Illuminate\Http\Request;

class BedroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['Bedrooms' => Bedrooms::All()]);

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
        $bedroom = new Bedrooms;

        $bedroom->id = $request->id;
        $bedroom->number = $request->number;
        $bedroom->description = $request->description;
        $bedroom->zone = $request->zone;
        $bedroom->cost = $request->cost;
        $bedroom->image1= $request->image1;
        $bedroom->image2= $request->image2;
        $bedroom->image3= $request->image3;
        $bedroom->category_id = $request->category_id; 


        $bedroom->save();
        return response()->json(['bedroom' => $bedroom]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $bedroom = Bedrooms::find($id);
  
        $bedroom->id = $request->id;
        $bedroom->number = $request->number;
        $bedroom->description = $request->description;
        $bedroom->zone = $request->zone;
        $bedroom->cost = $request->cost;
        $bedroom->image= $request->image;
        $bedroom->image2= $request->image2;
        $bedroom->image3= $request->image3;

        $bedroom->save();
        return response()->json(['bedroom' => $bedroom]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bedroom = Bedrooms::find($id);
        $bedroom->delete();
        return response()->json(['bedroom' => $bedroom]);
    }
}
