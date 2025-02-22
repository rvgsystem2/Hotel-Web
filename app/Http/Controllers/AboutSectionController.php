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
            'prime' => 'required|string',
            'quick_access' => 'required|string',
        ]);

        // Store main image
        $mainImagePath = $request->file('main_image')->store('about', 'public');

        // Store gallery images
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
            'gallery_images' => !empty($galleryImages) ? implode(',', $galleryImages) : null,
            'prime' => $request->prime,
            'quick_access' => $request->quick_access,
        ]);

        return redirect()->route('backend.about.index')->with('success', 'About section created!');
    }

    public function edit(AboutSection $about) {
        return view('backend.about.edit', compact('about'));
    }

    public function update(Request $request, AboutSection $about) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'main_image' => 'image|nullable',
            'gallery_images.*' => 'image',
            'prime' => 'required|string',
            'quick_access' => 'required|string',
        ]);

        // Update main image if new one is uploaded
        if ($request->hasFile('main_image')) {
            if ($about->main_image) {
                Storage::disk('public')->delete($about->main_image);
            }
            $about->main_image = $request->file('main_image')->store('about', 'public');
        }

        // Append new gallery images instead of deleting existing ones
        $galleryImages = $about->gallery_images ? explode(',', $about->gallery_images) : [];

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('about/gallery', 'public');
            }
        }

        $about->update([
            'title' => $request->title,
            'description' => $request->description,
            'main_image' => $about->main_image,
            'gallery_images' => !empty($galleryImages) ? implode(',', $galleryImages) : null,
            'prime' => $request->prime,
            'quick_access' => $request->quick_access,
        ]);

        return redirect()->route('backend.about.index')->with('success', 'About section updated!');
    }

    public function destroy(AboutSection $about) {
        if ($about->main_image) {
            Storage::disk('public')->delete($about->main_image);
        }

        // Delete gallery images
        if (!empty($about->gallery_images)) {
            foreach (explode(',', $about->gallery_images) as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $about->delete();

        return redirect()->route('backend.about.index')->with('success', 'About section deleted!');
    }

    public function removeMainImage($id) {
        $section = AboutSection::findOrFail($id);

        if ($section->main_image) {
            Storage::disk('public')->delete($section->main_image);
            $section->update(['main_image' => null]);

            return response()->json(['success' => true, 'message' => 'Main image removed successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Main image not found or already removed.']);
    }

    public function removeGalleryImage(Request $request, $id) {
    
        $section = AboutSection::findOrFail($id);
        $imageToRemove = $request->image;

        if ($section->gallery_images) {
            // $images = explode(',', $section->gallery_images);
            $updatedImages = array_values(array_filter($section->gallery_images, fn($image) => $image !== $imageToRemove));

            // Check if image exists before deleting
            if (Storage::disk('public')->exists($imageToRemove)) {
                Storage::disk('public')->delete($imageToRemove);
            }

            $section->update(['gallery_images' => count($updatedImages) > 0 ? implode(',', $updatedImages) : null]);

            // return response()->json(['success' => true, 'message' => 'Gallery image removed successfully.']);
            return back()->with('success', 'Gallery image removed successfully.');
        }

        return response()->json(['success' => false, 'message' => 'Gallery image not found or already removed.']);
    }
}
