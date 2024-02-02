<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['customers' => Customer::where('status', 1)->get()]);

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
        $customer = new Customer;

        $customer->id = $request->id;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        $customer->save();
        return response()->json(['customers' => $customer]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(['customers' => Customer::find($id)]);

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
        $customer = Customer::find($id);
     
        $customer->id = $request->id;
        $customer->first_name = $request->name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        $customer->save();
        return response()->json(['customers' => $customer]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        $customer->status = 0;
        $customer->save();
        return response()->json(['customers' => $customer]);
    }
}
