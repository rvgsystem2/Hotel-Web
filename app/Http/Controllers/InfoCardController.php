<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoCard;

class InfoCardController extends Controller
{
    public function index()
    {
        $infoCards = InfoCard::all();
        return view('backend.info_cards.index', compact('infoCards'));
    }

    public function create()
    {
        return view('backend.info_cards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'value' => 'required',
        ]);

        InfoCard::create($request->all());
        return redirect()->route('backend.info_cards.index')->with('success', 'InfoCard added successfully!');
    }

    public function edit(InfoCard $infoCard)
    {
        return view('backend.info_cards.edit', compact('infoCard'));
    }

    public function update(Request $request, InfoCard $infoCard)
    {
        $request->validate([
            'title' => 'required',
            'value' => 'required',
        ]);

        $infoCard->update($request->all());
        return redirect()->route('backend.info_cards.index')->with('success', 'InfoCard updated successfully!');
    }

    public function destroy(InfoCard $infoCard)
    {
        $infoCard->delete();
        return redirect()->route('backend.info_cards.index')->with('success', 'InfoCard deleted successfully!');
    }
}

