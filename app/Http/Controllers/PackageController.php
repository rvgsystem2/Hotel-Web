<?php 
namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('backend.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('backend.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
        ]);

        // Initialize image path
        $imagePath = null;

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('packages', 'public');
        }

        Package::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->route('backend.packages.index')->with('success', 'Package created successfully.');
    }

    public function edit(Package $package)
    {
        return view('backend.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
        ]);

        // Handle image upload if a new file is provided
        $imagePath = $package->image;
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($package->image) {
                Storage::disk('public')->delete($package->image);
            }
            $imagePath = $request->file('image')->store('packages', 'public');
        }

        // Only update the slug if the title has changed
        $slug = $package->slug;
        if ($request->title !== $package->title) {
            $slug = Str::slug($request->title);
        }

        $package->update([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->route('backend.packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(Package $package)
    {
        // Delete stored image if it exists
        if ($package->image) {
            Storage::disk('public')->delete($package->image);
        }

        $package->delete();

        return redirect()->route('backend.packages.index')->with('success', 'Package deleted successfully.');
    }
}
