<?php

namespace App\Http\Controllers;
use App\Models\Permission;
use Illuminate\Http\Request;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Permission::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $permission = new Permission();
        $permission->reasson = $request->reasson;
        $permission->datetime = $request->datetime;
        $permission->amount = $request->amount;
        $permission->student_id = $request->student_id;
        $permission-> save();
        return response()->json(['Create permission seccussfuly'], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Permission::findOrFail($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $permission = Permission::findOrFail($id);
        $permission->reasson = $request->reasson;
        $permission->datetime = $request->datetime;
        $permission->amount = $request->amount;
        $permission->student_id = $request->student_id;
        $permission-> save();
        return response()->json(['update permission seccussfuly'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDelete = Permission::destroy($id);
        if($isDelete == 1) 
            return response()->json(['message' => 'Deleted student successfully'], 200);
        return response()->json(['message' => 'ID NOT EXIST'], 404);
    }
   
}
