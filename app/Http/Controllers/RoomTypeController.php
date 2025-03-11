<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::all();
        return view('backend.room_types.index', compact('roomTypes'));
    }

    public function create()
    {
        return view('backend.room_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('room_types', 'public'); // Save images in "storage/app/public/room_types"
                $images[] = $path;
            }
        }

        RoomType::create([
            'name' => $request->name,
            'description' => $request->description,
            'images' => implode(',', $images), // Save as comma-separated string
        ]);

        return redirect()->route('backend.room_types.index')->with('success', 'Room Type added successfully!');
    }

    public function edit(RoomType $roomType)
    {
        return view('backend.room_types.edit', compact('roomType'));
    }

    public function update(Request $request, RoomType $roomType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $images = explode(',', $roomType->images); // Keep old images

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('room_types', 'public'); // Store new images
                $images[] = $path;
            }
        }

        $roomType->update([
            'name' => $request->name,
            'description' => $request->description,
            'images' => implode(',', $images), // Update stored images
        ]);

        return redirect()->route('backend.room_types.index')->with('success', 'Room Type updated successfully!');
    }

    public function destroy(RoomType $roomType)
    {
        // Delete images from storage
        foreach (explode(',', $roomType->images) as $image) {
            if (Storage::disk('public')->exists($image)) {
                Storage::disk('public')->delete($image);
            }
        }

        $roomType->delete();
        return redirect()->route('backend.room_types.index')->with('success', 'Room Type deleted successfully!');
    }
}
