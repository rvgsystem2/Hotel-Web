<?php  
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('roomType')->get();
        return view('backend.rooms.index', compact('rooms'));
    }

    public function create()
    {
        $roomTypes = RoomType::all();
        return view('backend.rooms.create', compact('roomTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'distance_from_station' => 'nullable|integer',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'is_available' => 'nullable|boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url|max:255',
        ]);

        $room = new Room();
        $room->room_type_id = $request->room_type_id;
        $room->title = $request->title;
        $room->description = $request->description;
        $room->location = $request->location;
        $room->distance_from_station = $request->distance_from_station;
        $room->capacity = $request->capacity;
        $room->price = $request->price;
        $room->is_available = $request->has('is_available') ? true : false;
        $room->link = $request->link;

        // Handle Image Uploads
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('room_images', 'public'); // Store in storage/app/public/room_images
                $imagePaths[] = $path;
            }
            $room->images = implode(',', $imagePaths);
        }

        $room->save();

        return redirect()->route('backend.rooms.index')->with('success', 'Room added successfully.');
    }

    public function edit(Room $room)
    {
        $roomTypes = RoomType::all();
        return view('backend.rooms.edit', compact('room', 'roomTypes'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'distance_from_station' => 'nullable|integer',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'is_available' => 'nullable|boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url|max:255',
        ]);

        $room->room_type_id = $request->room_type_id;
        $room->title = $request->title;
        $room->description = $request->description;
        $room->location = $request->location;
        $room->distance_from_station = $request->distance_from_station;
        $room->capacity = $request->capacity;
        $room->price = $request->price;
        $room->is_available = $request->has('is_available') ? true : false;
        $room->link = $request->link;

        // Handle Image Uploads
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('room_images', 'public');
                $imagePaths[] = $path;
            }

            // Delete old images if new images are uploaded
            if ($room->images) {
                $oldImages = explode(',', $room->images);
                foreach ($oldImages as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            $room->images = implode(',', $imagePaths);
        }

        $room->save();

        return redirect()->route('backend.rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        // Delete stored images
        if ($room->images) {
            $images = explode(',', $room->images);
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $room->delete();
        return redirect()->route('backend.rooms.index')->with('success', 'Room deleted successfully.');
    }
}
