<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::with('Permission')->latest()->get();
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
            'class' => 'required',
            'password' => 'required',
            'phone' => 'min:5|max:20',
            'image' =>'nullable|image|mimes:jpg,jpeg,png|max:2000',
        ]);
        $request -> file('image')->store('public/student/images');
        $student = new Student();
        $student->firstName = $request->firstName;
        $student->lastName = $request->lastName;
        $student->email = $request->email;
        $student->class = $request->class;
        $student->image =$request->file('image')->hashName();
        $student->gender = $request->gender;
        $student->password = $request->password;
        $student->phone = $request->phone;
        $student->save();
        return response()->json(['Create student seccussfuly'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::findOrFail($id);
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
            'class' => 'required',
            'password' => 'required',
            'phone' => 'min:5|max:10',

        ]);

        $student =  Student::findOrFail($id);
        $student->firstName = $request->firstName;
        $student->lastName = $request->lastName;
        $student->email = $request->email;
        $student->class = $request->class;
        $student->gender = $request->gender;
        $student->password = $request->password;
        $student->phone = $request->phone;

        $student->save();
        return response()->json(['Update student seccussfuly', 'data',$student],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Student::destroy($id);
            if($isDelete == 1) 
                return response()->json(['message' => 'Deleted student successfully'], 200);
            return response()->json(['message' => 'ID NOT EXIST'], 404);
        
    }

    public function search($name)
    {
        # code...
        return Student::where('firstName', 'like', '%' .$name .'%')->get();
    }
}
