<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inn;
use App\Models\Room;
use App\Models\Freebie;

class InnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $inns = Inn::all();
    $freebies = Freebie::all();
    return view('admin.inns.index')
    ->with('inns', $inns)
    ->with('freebies', $freebies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'inn_name' => 'required',
            'number_of_rooms' => 'required',
            "location_id" => 'required',
            "freebie_id" => 'required',
            'room_image' => 'image|nullable|max:1999'
        ]);
        
        if($request->hasFile('room_image')) {
            $filenameWithExt = $request->file('room_image');
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('room_image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('room_image')->storeAs('public/projects/room_images', $filenameToStore);
        }
        else {
            $filenameToStore = 'noimage.jpg';
        }

        $inn = new Inn;
        $inn->inn_name = $request->inn_name;
        $inn->number_of_rooms = $request->number_of_rooms;
        $inn->location_id = $request->location_id;
        $inn->freebie_id = $request->freebie_id;
        $inn->room_image =  $filenameToStore;
        $inn->save();

        return redirect()->back()->with('success', 'Inn Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inn = Inn::find($id);
        $rooms = Room::select('*')->where('inn_id', $id)->get();
        $freebies = Freebie::all();
        return view('admin.inns.show')
        ->with('inn', $inn)
        ->with('freebies', $freebies)
        ->with('rooms', $rooms);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inn = Inn::find($id);
    return view('admin.inns.edit')->with('inn', $inn);
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


        $this->validate($request, [
            'inn_name' => 'required',
            'number_of_rooms' => 'required',
            "location_id" => 'required',
            'room_image' => 'image|nullable|max:1999'
        ]);

        
        if($request->hasFile('room_image')) {
            $filenameWithExt = $request->file('room_image');
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('room_image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('room_image')->storeAs('public/projects/room_images', $filenameToStore);
        }
        else {
            $filenameToStore = 'noimage.jpg';
        }

        $inn = Inn::find($id);
        $inn->inn_name = $request->inn_name;
        $inn->number_of_rooms = $request->number_of_rooms;
        $inn->location_id = $request->location_id;
        $inn->room_image =  $filenameToStore;
        $inn->save();

        return redirect('/admin/inns')->with('success', 'Inn Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inn = Inn::find($id);
        $inn->delete();

        return redirect()->back()->with('success', 'Deleted Successfully!');
    }
}
