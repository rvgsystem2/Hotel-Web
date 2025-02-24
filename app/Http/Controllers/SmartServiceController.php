<?php

namespace App\Http\Controllers;

use App\Models\SmartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SmartServiceController extends Controller
{
    public function index()
    {
        $services = SmartService::all();
        return view('backend.smart_services.index', compact('services'));
    }

    // Show the create form
    public function create()
    {
        return view('backend.smart_services.create');
    }

    // Store a new service
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'icon' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
            'badge_text' => 'nullable|string|max:255',
            'badge_color' => 'nullable|string|max:255',
            'cta_text' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/smart_services', 'public');
            $data['image'] = $imagePath;
        }

        SmartService::create($data);

        return redirect()->route('backend.smart_services.index')->with('success', 'Service added successfully.');
    }

    // Show the edit form
    public function edit(SmartService $smartService)
    {
        return view('backend.smart_services.edit', compact('smartService'));
    }

    // Update a service
    public function update(Request $request, SmartService $smartService)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'icon' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'badge_text' => 'nullable|string|max:255',
            'badge_color' => 'nullable|string|max:255',
            'cta_text' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        // Handle Image Upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($smartService->image && Storage::exists('public/' . $smartService->image)) {
                Storage::delete('public/' . $smartService->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('uploads/smart_services', 'public');
            $data['image'] = $imagePath;
        }

        $smartService->update($data);

        return redirect()->route('backend.smart_services.index')->with('success', 'Service updated successfully.');
    }

    // Delete a service
    public function destroy(SmartService $smartService)
    {
        // Delete the image from storage
        if ($smartService->image && Storage::exists('public/' . $smartService->image)) {
            Storage::delete('public/' . $smartService->image);
        }

        $smartService->delete();

        return redirect()->route('backend.smart_services.index')->with('success', 'Service deleted successfully.');
    }
}
