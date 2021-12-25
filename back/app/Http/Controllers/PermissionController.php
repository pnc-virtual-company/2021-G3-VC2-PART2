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
        return Permission::with(["student"])->latest()->get();
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
        $request->validate([
            'reason' => 'min:1|max:100',
            'description' => 'min:1|max:200',
            'start_date' => 'required|before:end_date',
            'end_date' => 'required|after:start_date'
        ]);
        $permission = new Permission();
        $permission->reason = $request->reason;
        $permission -> description = $request -> description;
        $permission->start_date = $request->start_date;
        $permission->end_date = $request->end_date;
        $permission->student_id = $request->student_id;
        $permission-> save();
        return response()->json(['Create permission seccussfuly', 'data', $permission], 201);

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
        $request->validate([
            'reason' => 'min:1|max:100',
            'description' => 'min:1|max:200',
            'start_date' => 'required|before:end_date',
            'end_date' => 'required|after:start_date'
        ]);
        $permission = Permission::findOrFail($id);
        $permission->reason = $request->reasson;
        $permission -> description = $request -> description;
        $permission->start_date = $request->start_date;
        $permission->end_date = $request->end_date;
        $permission->student_id = $request->student_id;
        $permission-> save();
        return response()->json(['update permission seccussfuly', 'data',$permission ], 200);
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
