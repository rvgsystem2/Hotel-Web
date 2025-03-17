<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class GuestController extends Controller
{
    // Display a listing of the guests
    public function index()
    {
        $guests = Guest::all();
        return view('backend.guests.index', compact('guests'));
    }

    // Show the form for creating a new guest
    public function create()
    {
        return view('backend.guests.create');
    }

    // Store a newly created guest in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:guests,email',
            'phone' => 'required|string|unique:guests,phone',
            'address' => 'nullable|string',
        ]);

        Guest::create($request->all());

        return redirect()->route('backend.guests.index')->with('success', 'Guest created successfully!');
    }

    // Display the specified guest
    public function show(Guest $guest)
    {
        return view('backend.guests.show', compact('guest'));
    }

    // Show the form for editing the specified guest
    public function edit(Guest $guest)
    {
        return view('backend.guests.edit', compact('guest'));
    }

    // Update the specified guest in storage
    public function update(Request $request, Guest $guest)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:guests,email,' . $guest->id,
            'phone' => 'required|string|unique:guests,phone,' . $guest->id,
            'address' => 'nullable|string',
        ]);

        $guest->update($request->all());

        return redirect()->route('backend.guests.index')->with('success', 'Guest updated successfully!');
    }

    // Remove the specified guest from storage
    public function destroy(Guest $guest)
    {
        $guest->delete();
        return redirect()->route('backend.guests.index')->with('success', 'Guest deleted successfully!');
    }
}
