<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discipline;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Discipline::all();
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
            'notice_type' => 'min:1|max:200'
            ]);
            
            $discipline = new Discipline();
            // $desciple->student_id = $request->student_id;
            $discipline->start_date = $request->start_date;
            $discipline->reason = $request->reason;
            $discipline->notice_type = $request->notice_type;
            
            $discipline->save();
            return response()->json(['Create Discipline seccussfuly', 'data', $discipline], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Discipline::findOrFail($id);
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
            'reason' => 'min:1|max:100',
            'notice_type' => 'min:1|max:200'
            ]);
            
            $discipline = Discipline:: findOrFail($id);
            // $desciple->student_id = $request->student_id;
            $discipline->start_date = $request->start_date;
            $discipline->reason = $request->reason;
            $discipline->notice_type = $request->notice_type;
            
            $discipline->save();
            return response()->json(['Update Discipline seccussfuly', 'data', $discipline], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Discipline::destroy($id);
        if($isDelete == 1) 
            return response()->json(['message' => 'Deleted desciple successfully'], 200);
        return response()->json(['message' => 'ID NOT EXIST'], 404);
    }
    public function search($name)
    {
        # code...
        return Discipline::where('reason', 'like', '%' .$name .'%')->get();
    }
}
