<?php  
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomFacility;
use App\Models\Room;
use App\Http\Requests\RoomFacilityRequest;

class RoomFacilityController extends Controller
{
    public function index()
    {
        $facilities = RoomFacility::with('room')->paginate(10);
        return view('backend.room_facilities.index', compact('facilities'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('backend.room_facilities.create', compact('rooms'));
    }

    public function store(Request $request) // Use normal Request class
{
    // dd($request->all()); // Check if data is there
    RoomFacility::create($request->only(['room_id', 'facility_name']));
    return redirect()->route('backend.room_facilities.index')->with('success', 'Facility added successfully!');
}


public function edit(RoomFacility $roomFacility)
{
    $rooms = Room::all();
    return view('backend.room_facilities.edit', [
        'facility' => $roomFacility, // Ensure correct variable name
        'rooms' => $rooms
    ]);
}

public function update(RoomFacilityRequest $request, RoomFacility $roomFacility)
{
    $roomFacility->update($request->only(['room_id', 'facility_name']));
    return redirect()->route('backend.room_facilities.index')->with('success', 'Facility updated successfully!');
}

    public function destroy(RoomFacility $roomFacility)
    {
        $roomFacility->delete();
        return redirect()->route('backend.room_facilities.index')->with('success', 'Facility deleted successfully!');
    }
}
