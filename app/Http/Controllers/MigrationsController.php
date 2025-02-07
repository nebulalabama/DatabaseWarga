<?php

namespace App\Http\Controllers;

use App\Models\Migrations;
use App\Models\Resident;
use Illuminate\Http\Request;

class MigrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $migrations = Migrations::all();
        return view('migrations.index', compact('migrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $residents = Resident::get();
        return view('migrations.create', compact('residents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'resident_id' => 'required|exists:residents,id',
            'date' => 'required|date',
            'from' => 'required|string|max:50',
            'to' => 'required|string|max:50',
            'cause' => 'required|string',
            'migration_type' => 'required|in:internal,international,temporary,permanent',
        ]);

        Migrations::create($data);

        return redirect()->route('migrations.index')->with('success', 'Migration created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Migrations::find($id);
        $residents = Resident::all();
        // return view('migrations.show', compact('data', 'residents'));
        return view('migrations.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Migrations::find($id);
        $residents = Resident::all();
        return view('migrations.edit', compact('data', 'residents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'resident_id' => 'required|exists:residents,id',
            'date' => 'required|date',
            'from' => 'required|string|max:50',
            'to' => 'required|string|max:50',
            'cause' => 'required|string',
            'migration_type' => 'required|in:internal,international,temporary,permanent',
        ]);

        Migrations::find($id)->update([
            'resident_id' => $request->resident_id,
            'date' => $request->date,
            'from' => $request->from,
            'to' => $request->to,
            'cause' => $request->cause,
            'migration_type' => $request->migration_type,
        ]);

        return redirect()->route('migrations.index')->with('success', 'Migration updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Migrations::find($id)->delete();
        return redirect()->route('migrations.index')->with('success', 'Migration delete succesfully');
    }
}