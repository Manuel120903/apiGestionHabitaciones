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
        $user-> phone = $request->phone;
        $user-> role = $request->role;
       
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $request->file('image')->move('storage/images/profilePics/', $fileName);
            $user->image = asset('storage/images/profilePics/' . $fileName);
        } else {
            // nombre de una imagen default por si el usuario no ingreso ninguna
            $user->image = asset('storage/images/utilities/default.jpg');
        }

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
        $user-> image = $request->image;
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
