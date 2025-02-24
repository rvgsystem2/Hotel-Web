<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();
        return view('backend.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('backend.experiences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_description' => 'required|string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string|url',
        ]);

        $data = $request->except('image');

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('experiences', 'public');
        }

        Experience::create($data);

        return redirect()->route('backend.experiences.index')->with('success', 'Experience created successfully!');
    }

    public function edit(Experience $experience)
    {
        return view('backend.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_description' => 'required|string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string|url',
        ]);

        $data = $request->except('image');

        // Handle Image Update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($experience->image) {
                Storage::disk('public')->delete($experience->image);
            }

            $data['image'] = $request->file('image')->store('experiences', 'public');
        }

        $experience->update($data);

        return redirect()->route('backend.experiences.index')->with('success', 'Experience updated successfully!');
    }

    public function destroy(Experience $experience)
    {
        // Delete image file
        if ($experience->image) {
            Storage::disk('public')->delete($experience->image);
        }

        $experience->delete();
        return redirect()->route('backend.experiences.index')->with('success', 'Experience deleted successfully!');
    }
}
