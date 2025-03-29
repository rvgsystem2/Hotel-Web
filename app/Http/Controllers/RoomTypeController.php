<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller {
    public function index() {
        $roomTypes = RoomType::all();
        return view('backend.room_types.index', compact('roomTypes'));
    }

    public function create() {
        return view('backend.room_types.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('room_types', 'public') : null;

        RoomType::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('backend.room_types.index')->with('success', 'Room Type added successfully.');
    }

    public function edit(RoomType $roomType) {
        return view('backend.room_types.edit', compact('roomType'));
    }

    public function update(Request $request, RoomType $roomType) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($roomType->image) {
                Storage::disk('public')->delete($roomType->image);
            }
            $roomType->image = $request->file('image')->store('room_types', 'public');
        }

        $roomType->update($request->only(['name', 'description', 'image']));

        return redirect()->route('backend.room_types.index')->with('success', 'Room Type updated successfully.');
    }

    public function destroy(RoomType $roomType) {
        if ($roomType->image) {
            Storage::disk('public')->delete($roomType->image);
        }
        $roomType->delete();
        return redirect()->route('backend.room_types.index')->with('success', 'Room Type deleted successfully.');
    }
}
