<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\RoomType;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with(['hotel', 'roomType'])->get();
        return view('backend.rooms.index', compact('rooms'));
    }

    public function create()
    {
        $hotels = Hotel::all();
        $roomTypes = RoomType::all();
        return view('backend.rooms.create', compact('hotels', 'roomTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_type_id' => 'required|exists:room_types,id',
            'room_number' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|in:available,booked,maintenance',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->store('rooms', 'public');
                $imagePaths[] = $path;
            }
        }

        Room::create([
            'hotel_id' => $request->hotel_id,
            'room_type_id' => $request->room_type_id,
            'room_number' => $request->room_number,
            'price' => $request->price,
            'status' => $request->status,
            'image' => implode(',', $imagePaths),
        ]);

        return redirect()->route('backend.rooms.index')->with('success', 'Room added successfully!');
    }

    public function edit(Room $room)
    {
        $hotels = Hotel::all();
        $roomTypes = RoomType::all();
        return view('backend.rooms.edit', compact('room', 'hotels', 'roomTypes'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_type_id' => 'required|exists:room_types,id',
            'room_number' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|in:available,booked,maintenance',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePaths = explode(',', $room->image); 

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->store('rooms', 'public');
                $imagePaths[] = $path;
            }
        }

        $room->update([
            'hotel_id' => $request->hotel_id,
            'room_type_id' => $request->room_type_id,
            'room_number' => $request->room_number,
            'price' => $request->price,
            'status' => $request->status,
            'image' => implode(',', $imagePaths),
        ]);

        return redirect()->route('backend.rooms.index')->with('success', 'Room updated successfully!');
    }

    public function destroy(Room $room)
    {
        if ($room->image) {
            foreach (explode(',', $room->image) as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        $room->delete();
        return redirect()->route('backend.rooms.index')->with('success', 'Room deleted successfully!');
    }

    public function show(Room $room)
    {
        return view('backend.rooms.show', compact('room'));
    }
}
