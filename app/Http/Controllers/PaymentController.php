<?php

namespace App\Http\Controllers;

use App\Models\payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['payment' => Payment::where('status', 1)->get()]);
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
        $payment = new Payment;

        $payment->id = $request->id;
        $payment->date = $request->date;    
        $payment->amount = $request->amount;
        $payment->origin = $request->origin;

        $payment->save();
        return response()->json(['payment' => $payment]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(['payment' => Payment::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payment = Payment::find($id);

        $payment->id = $request->id;
        $payment->date = $request->date;    
        $payment->amount = $request->amount;
        $payment->origin = $request->origin;

        $payment->save();
        return response()->json(['payment' => $payment]);
                
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::find($id);
        $payment->status = 0;
        $payment->save();
        return response()->json(['payment' => $payment]);
    }
}
