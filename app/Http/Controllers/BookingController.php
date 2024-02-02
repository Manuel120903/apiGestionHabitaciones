<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['booking' => booking::all()]);
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
        $booking = new booking;
        
        $booking->id = $request->id;
        $booking->customer_id = $request->customer_id;
        $booking->bedroom_id = $request->bedroom_id;
        $booking->date = $request->date;
        $booking->user_id = $request->user_id;
        $booking->subtotal = $request->subtotal;
        $booking->payment_id = $request->payment_id;

        $booking->save();
        return response()->json(['booking' => $booking]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(['booking' => booking::find($id)]);
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
        $booking = booking::find($id);

        $booking->id = $request->id;
        $booking->customer_id = $request->customer_id;
        $booking->bedroom_id = $request->bedroom_id;
        $booking->date = $request->date;
        $booking->user_id = $request->user_id;
        $booking->subtotal = $request->subtotal;
        $booking->payment_id = $request->payment_id;

        $booking->save();
        return response()->json(['booking' => $booking]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = booking::find($id);
        $booking->delete();
        return response()->json(['booking' => $booking]);
    }
}
