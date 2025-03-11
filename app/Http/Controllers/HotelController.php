<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('backend.hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('backend.hotels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hotels', 'public');
        }

        Hotel::create([
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('backend.hotels.index')->with('success', 'Hotel added successfully!');
    }

    public function edit(Hotel $hotel)
    {
        return view('backend.hotels.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($hotel->image) {
                Storage::disk('public')->delete($hotel->image);
            }
            $hotel->image = $request->file('image')->store('hotels', 'public');
        }

        $hotel->update([
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
            'image' => $hotel->image,
        ]);

        return redirect()->route('backend.hotels.index')->with('success', 'Hotel updated successfully!');
    }

    public function destroy(Hotel $hotel)
    {
        if ($hotel->image) {
            Storage::disk('public')->delete($hotel->image);
        }
        
        $hotel->delete();
        return redirect()->route('backend.hotels.index')->with('success', 'Hotel deleted successfully!');
    }
}
