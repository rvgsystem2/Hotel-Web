<?php
namespace App\Http\Controllers;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller {
    public function index() {
        $sections = AboutSection::all();
        return view('backend.about.index', compact('sections'));
    }
    
    public function create() {
        return view('backend.about.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'main_image' => 'required|image',
            'gallery_images.*' => 'image',
        ]);
        
        $mainImagePath = $request->file('main_image')->store('about', 'public');
        
        $galleryImages = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('about/gallery', 'public');
            }
        }
        
        AboutSection::create([
            'title' => $request->title,
            'description' => $request->description,
            'main_image' => $mainImagePath,
            'gallery_images' => implode(',', $galleryImages),
        ]);
        
        return redirect()->route('about.index')->with('success', 'About section created!');
    }
    
    public function edit(AboutSection $about) {
        return view('backend.about.edit', compact('about'));
    }
    
    public function update(Request $request, AboutSection $about) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'main_image' => 'image',
            'gallery_images.*' => 'image',
        ]);
        
        if ($request->hasFile('main_image')) {
            Storage::disk('public')->delete($about->main_image);
            $about->main_image = $request->file('main_image')->store('about', 'public');
        }
        
        if ($request->hasFile('gallery_images')) {
            foreach (explode(',', $about->gallery_images) as $oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('about/gallery', 'public');
            }
            $about->gallery_images = implode(',', $galleryImages);
        }
        
        $about->update($request->only('title', 'description'));
        
        return redirect()->route('about.index')->with('success', 'About section updated!');
    }
    
    public function destroy(AboutSection $about) {
        Storage::disk('public')->delete($about->main_image);
        foreach (explode(',', $about->gallery_images) as $image) {
            Storage::disk('public')->delete($image);
        }
        $about->delete();
        return redirect()->route('about.index')->with('success', 'About section deleted!');
    }
}
