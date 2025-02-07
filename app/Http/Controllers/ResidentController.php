<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use App\Models\Neighborhoods;
use App\Models\CommunityUnits;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Resident::all();
        // dd($data);
        return view('penduduk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subDistricts = SubDistrict::all();
        $neighborhoods = Neighborhoods::all();
        $community_units = CommunityUnits::all();
        // $family_card_details = FamilyCardDetails::all();
        return view('penduduk.create', compact('subDistricts', 'neighborhoods', 'community_units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'nik' => ['required', 'max:16'],
            'name' => ['required', 'max:255'],
            'pob' => ['required', 'max:255'],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'in:L,P'],
            'religion' => ['required', 'in:islam,kristen,katolik,hindu,buddha,lainnya'],
            'last_education' => ['required', 'in:SD,SMP,SMA,Sarjana,Diploma,Doktor'],
            'citizenship' => ['required', 'in:WNI,WNA'],
            'marital_status' => ['required', 'in:nikah,belum nikah'],
            'sub_district_id' => ['required'],
            'neighborhood_id' => ['required'],
            'community_unit_id' => ['required'],
            // 'family_card_detail_id' => ['required', 'exists:family_card_details,id'],
        ]);

        // dd($validated);


        $resident = Resident::create(
            [
                'nik' => $validated['nik'],
                'name' => $validated['name'],
                'pob' => $validated['pob'],
                'dob' => $validated['dob'],
                'gender' => $validated['gender'],
                'religion' => $validated['religion'],
                'last_education' => $validated['last_education'],
                'citizenship' => $validated['citizenship'],
                'marital_status' => $validated['marital_status'],
                'sub_district_id' => $validated['sub_district_id'],
                'neighborhood_id' => $validated['neighborhood_id'],
                'community_unit_id' => $validated['community_unit_id'],
                // 'family_card_detail_id' => $validated['family_card_detail_id'],
            ]
        );

// dd($resident);

        return redirect()->route('residents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resident $resident)
    {
        $data = Resident::find($resident->id);
        return view('penduduk.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resident $resident)
    {
        $data = Resident::find($resident->id);
        $sub_districts = SubDistrict::all();
        $neighborhoods = Neighborhoods::all();
        $community_units = CommunityUnits::all();
        // $family_card_details = FamilyCardDetails::all();
        return view('penduduk.edit', compact('data', 'sub_districts', 'neighborhoods', 'community_units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resident $resident)
    {
        $validated = $request->validate([
            'nik' => ['required', 'max:16'],
            'name' => ['required', 'max:255'],
            'pob' => ['required', 'max:255'],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'in:L,P'],
            'religion' => ['required', 'in:islam,kristen,katolik,hindu,buddha,lainnya'],
            'last_education' => ['required', 'in:SD,SMP,SMA,Sarjana,Diploma,Doktor'],
            'citizenship' => ['required', 'in:WNI,WNA'],
            'marital_status' => ['required', 'in:true,false'],
            'sub_district_id' => ['required'],
            'neighborhood_id' => ['required',],
            'community_unit_id' => ['required'],
            // 'family_card_detail_id' => ['required', 'exists:family_card_details,id'],
        ]);

        Resident::where('id', $resident->id)->update(
            [
                'nik' => $validated['nik'],
                'name' => $validated['name'],
                'pob' => $validated['pob'],
                'dob' => $validated['dob'],
                'gender' => $validated['gender'],
                'religion' => $validated['religion'],
                'last_education' => $validated['last_education'],
                'citizenship' => $validated['citizenship'],
                'marital_status' => $validated['marital_status'],
                'sub_district_id' => $validated['sub_district_id'],
                'neighborhood_id' => $validated['neighborhood_id'],
                'community_unit_id' => $validated['community_unit_id'],
                // 'family_card_detail_id' => $validated['family_card_detail_id'],
            ]
        );

        return redirect()->route('residents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resident $resident)
    {
        $resident = Resident::find($resident->id);
        $resident->delete();
        return redirect()->route('residents.index');
    }
}
