<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
        
    }
    //

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email= $request->email;
        $user->password = bcrypt($request->password);
        $user->profile= $request->profile;
        $user->save();
        return response()->json(['Message' =>' Create user Succesfully', 'user' => $user], 201);
    }

// .............................User signin.........................
    public function signin(Request $request)
    {
        //Chek password
        $user = User::where ('email', $request->email)->first();

        //Create user
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['message' => 'User can not lognin'], 401);
        }
        return response()->json([
            'User signin succesfuly'
        ]);
    }

    // ........................User signout........................
    public function signout(Request $request)
    {
        return response()->json(['message'=>'User signout successfuly']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
