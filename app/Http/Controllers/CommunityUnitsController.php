<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityUnits;

class CommunityUnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CommunityUnits::all();
        return view('comunity.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comunity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'no_rw' => 'required',
            'head' => 'required',
        ]);

        CommunityUnits::create([
            'name' => $data['no_rw'],
            'head' => $data['head'],
        ]);

        return redirect()->route('community_units.index')->with('succes', 'Data RW berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = CommunityUnits::find($id);
        return view('comunity.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = CommunityUnits::find($id);
        return view('comunity.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'no_rw' => 'required',
            'head' => 'required',
        ]);

        CommunityUnits::find($id)->update([
            'name' => $request->no_rw,
            'head' => $request->head,
        ]);

        return redirect()->route('community_units.index')->with('success', 'Data RW berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CommunityUnits::find($id)->delete();
        return redirect()->route('community_units.index')->with('success', 'Data RW berhasil dihapus');
    }
}
