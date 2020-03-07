<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Room;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Item::all(), 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Room  $room
     * @return \Illuminate\Http\Response
     */
    public function byRoom(Request $request, Room $room)
    {
        return response($room->items, 200);
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
            'room_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'quantity' => 'required',
            'status' => 'required',
        ]);

        $imageFile = $request->file('image');

        if (!$imageFile->isValid()){
            return response()->json(['invalid_file_upload'], 400);
        }

        $path = storage_path() . "/app/public/";
        $target = $imageFile->move($path, $imageFile->getClientOriginalName());

        $item = new item([
            'room_id' => $request->get('room_id'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'image' => $target->getFilename(),
            'quantity' => $request->get('quantity'),
            'status' => $request->get('status'),
        ]);

        $item->save();

        return response($item, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return response($item, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $data = [
            'room_id' => $request->input('room_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
            'status' => $request->input('status'),
        ];

        $imageFile = $request->file('image');

        if ($imageFile && !$imageFile->isValid()){
            return response()->json(['invalid_file_upload'], 400);
        }

        if ($imageFile){
            $path = storage_path() . "/app/public/";
            $target = $imageFile->move($path, $imageFile->getClientOriginalName());

            $data['image'] = $target->getFilename();
        }

        if (!$item->update($data)){
            return response('', 500);
        }

        return response('', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return response('', 200);
    }
}
