<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inn;
use App\Models\Room;
use App\Models\Freebie;

class InnManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $inn->user_id = $request->user_id;
        $inn->room_image =  $filenameToStore;
        $inn->save();

        return redirect('/user/dashboard')->with('success', 'Inn Added Successfully!');
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
        //
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
