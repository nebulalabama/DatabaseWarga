<?php

namespace App\Http\Controllers;

use App\Models\SubDistrict;
use Illuminate\Http\Request;

class SubDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = SubDistrict::all();
        // dd($data);

        return view('district.index', ['subDistricts' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('district.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kelurahan' => ['required', 'string', 'max:255'],
            'lurah' => ['required', 'string', 'max:255']
        ]);

        SubDistrict::create(
            [
                'name' => $validated['kelurahan'],
                'head' => $validated['lurah']
            ]
        );

        return redirect()->route('sub_districts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubDistrict $subDistrict)
    {
        $data = SubDistrict::find($subDistrict->id);
        return view('district.show', [
            'subDistrict' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubDistrict $subDistrict)
    {
        $subDistrict = SubDistrict::find($subDistrict->id);
        return view('district.edit', [
            'subDistrict' => $subDistrict
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubDistrict $subDistrict)
    {
        $validated = $request->validate([
            'kelurahan' => ['required', 'string', 'max:255'],
            'lurah' => ['required', 'string', 'max:255']
        ]);

        SubDistrict::where('id', $subDistrict->id)->update(
            [
                'name' => $validated['kelurahan'],
                'head' => $validated['lurah']
            ]
        );

        return redirect()->route('sub_districts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubDistrict $subDistrict)
    {
        $subDistrict = SubDistrict::find($subDistrict->id);
        $subDistrict->delete();

        return redirect()->route('sub_districts.index');
    }
}
