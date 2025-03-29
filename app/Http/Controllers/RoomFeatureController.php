<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RoomFeature;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomFeatureController extends Controller
{
    public function index()
    {
        $roomFeatures = RoomFeature::with('roomType')->get();
        return view('backend.room_features.index', compact('roomFeatures'));
    }

    public function create()
    {
        $roomTypes = RoomType::all();
        return view('backend.room_features.create', compact('roomTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'feature' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
        ]);

        RoomFeature::create($request->all());

        return redirect()->route('backend.room_features.index')->with('success', 'Feature added successfully.');
    }

    public function edit(RoomFeature $roomFeature)
    {
        $roomTypes = RoomType::all();
        return view('backend.room_features.edit', compact('roomFeature', 'roomTypes'));
    }

    public function update(Request $request, RoomFeature $roomFeature)
    {
        $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'feature' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
        ]);

        $roomFeature->update($request->all());

        return redirect()->route('backend.room_features.index')->with('success', 'Feature updated successfully.');
    }

    public function destroy(RoomFeature $roomFeature)
    {
        $roomFeature->delete();
        return redirect()->route('backend.room_features.index')->with('success', 'Feature deleted successfully.');
    }
}

