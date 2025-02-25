<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index() {
        $testimonials = Testimonial::all();
        return view('backend.testimonial.index', compact('testimonials'));
    }
    
    public function create() {
        return view('backend.testimonial.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'review' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        
        Testimonial::create($request->all());
        
        return redirect()->route('backend.testimonial.index')->with('success', 'Testimonial added successfully.');
    }
    
    public function edit(Testimonial $testimonial) {
        return view('backend.testimonial.edit', compact('testimonial'));
    }
    
    public function update(Request $request, Testimonial $testimonial) {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'review' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        
        $testimonial->update($request->all());
        
        return redirect()->route('backend.testimonial.index')->with('success', 'Testimonial updated successfully.');
    }
    
    public function destroy(Testimonial $testimonial) {
        $testimonial->delete();
        
        return redirect()->route('backend.testimonial.index')->with('success', 'Testimonial deleted successfully.');
    }
}
