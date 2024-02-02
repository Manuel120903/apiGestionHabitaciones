<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['users' => User::where('status', 1)->get()]);
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
        $user = new User;

        $user-> id = $request->id;
        $user-> name = $request->name;
        $user-> email = $request->email;
        $user-> password = Hash::make($request->password);
        $user-> image = $request->image;
        $user-> phone = $request->phone;
        $user-> role = $request->role;

        $user->save();
        return response()->json(['user' => $user]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(['user' => User::find($id)]);
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
        $user = User::find($id);

        $user-> id = $request->id;
        $user-> name = $request->name;
        $user-> email = $request->email;
        //$user-> password = bcrypt($request->password);
        $user-> img = $request->img;
        $user-> phone = $request->phone;
        $user-> role = $request->role;

        $user->save();
        return response()->json(['user' => $user]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();
        return response()->json(['user' => $user]); 
    }
}
