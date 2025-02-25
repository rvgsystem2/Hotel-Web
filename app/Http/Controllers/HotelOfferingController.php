<?php

namespace App\Http\Controllers;

use App\Models\HotelOffering;
use Illuminate\Http\Request;

class HotelOfferingController extends Controller
{

    public function index()
    {
        $offerings = HotelOffering::all();
        return view('backend.hotel_offerings.index', compact('offerings')); 
    }

    
    public function create()
    {
        return view('backend.hotel_offerings.create'); 
    }


    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
        ]);

        HotelOffering::create($request->all());

        return redirect()->route('backend.hotel_offerings.index')->with('success', 'Offering added successfully.');
    }

    // Show form to edit an existing offering
    public function edit($id)
    {
    $offering = HotelOffering::findOrFail($id);
    return view('backend.hotel_offerings.edit', compact('offering'));
    }


    // Update an existing offering
    public function update(Request $request, HotelOffering $hotelOffering)
    {
        $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
        ]);

        $hotelOffering->update($request->all());

        return redirect()->route('backend.hotel_offerings.index')->with('success', 'Offering updated successfully.');
    }

    // Delete an offering
    public function destroy(HotelOffering $hotelOffering)
    {
        $hotelOffering->delete();

        return redirect()->route('dashboard.hotel_offerings.index')->with('success', 'Offering deleted successfully.');
    }
}
