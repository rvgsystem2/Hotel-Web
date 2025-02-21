<?php 
namespace App\Http\Controllers;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class HeroSectionController extends Controller
{
   
        public function index()
        {
            $heroSections = HeroSection::all(); // Use plural to avoid confusion
            return view('backend.hero.index', compact('heroSections'));
        }
        
    

    public function create()
    {
        return view('backend.hero.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video' => 'nullable|mimes:mp4,mov,avi|max:20480', // Max 20MB
            'button_text' => 'nullable',
            'button_link' => 'nullable|url',
        ]);

        $data = $request->except('video');

        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('videos', 'public');
        }

        HeroSection::create($data);
        return redirect()->route('backend.hero.index')->with('success', 'Hero Section Created!');
    }

    public function edit(HeroSection $hero)
    {
        return view('backend.hero.edit', compact('hero'));
    }

    public function update(Request $request, HeroSection $hero)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video' => 'nullable|mimes:mp4,mov,avi|max:20480',
            'button_text' => 'nullable',
            'button_link' => 'nullable|url',
        ]);

        $data = $request->except('video');

        if ($request->hasFile('video')) {
            Storage::disk('public')->delete($hero->video);
            $data['video'] = $request->file('video')->store('videos', 'public');
        }

        $hero->update($data);
        return redirect()->route('backend.hero.index')->with('success', 'Hero Section Updated!');
    }

    public function destroy(HeroSection $hero)
    {
        Storage::disk('public')->delete($hero->video);
        $hero->delete();
        return redirect()->route('hero.index')->with('success', 'Hero Section Deleted!');
    }
}