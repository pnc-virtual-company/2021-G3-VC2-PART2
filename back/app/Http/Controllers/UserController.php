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
        return User::with(['student'])->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'role' => 'required',
            'password' =>'min:1|max:20|confirmed',
            'profile'=>'nullable|image|mimes:jpg,jpeg,png,gif,jfif|max:1999',
            
        ]);
        $request -> file('profile')->store('public/users/images');
        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->student_id = $request->student_id;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->profile =$request->file('profile')->hashName();
        
        $user->save();

        return response()->json(['message' => 'The user create', 'user successfully' => $user], 201);
    
    }

// .............................User signin.........................
    public function signin(Request $request)
    {
        //Check password 
        $user = User::where('email', $request->email)->first();
        //Create 
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['message' => 'Bad login'], 401);
        }
        return response()->json([
            'message' => 'User login successfully',
            'user' => $user
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
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'role' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->student_id = $request->student_id;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->save();

        return response()->json(['message' => 'User update successfully', 'user' => $user], 200);
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = User::destroy($id);
        if($isDelete == 1) 
            return response()->json(['message' => 'User deleted successfully'], 200);
        return response()->json(['message' => 'ID NOT EXIST'], 404);
    }

    public function search($name)
    {
        # code...
        return User::where('firstName', 'like', '%' .$name .'%')->get();
    }
}
