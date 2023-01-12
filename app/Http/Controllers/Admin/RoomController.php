<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomModel;
use App\Models\TypeModel;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RoomModel::with('Roomtype')->get();
        return view('back.pages.room.index')->with(["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data = TypeModel::all();
        return view('back.pages.room.create')->with(["data" => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all(); 
        $data["status"]  = "";
        RoomModel::create($data);
        return redirect()->route('admin.room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = RoomModel::find($id);
        $data2 = TypeModel::all();
        return view('back.pages.room.edit')->with(["data" => $data, "data2" => $data2]);
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
        $data = RoomModel::find($id);
        $data->update($request->all());
        return redirect()->route("admin.room.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoomModel::destroy($id);
        return redirect()->route('admin.room.index');
    }

    public function changeStatus($id, $status){
        $data = RoomModel::find($id);
        $data->update([
            "status" => $status
        ]);
        return redirect()->route('admin.room.index');
    }
}
