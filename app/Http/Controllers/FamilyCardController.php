<?php

namespace App\Http\Controllers;

use App\Models\FamilyCard;
use App\Models\FamilyCardDetail;
use App\Models\Resident;
use Illuminate\Http\Request;
use Error;

class FamilyCardController extends Controller
{
/**
 * Display a listing of the FAMILY CARD.
 */
public function index()
{
    // Get all family cards
    $familyCards = FamilyCard::all();

    // Render view
    return view('family.index', compact('familyCards'));
}

/**
 * Show the form for creating a new FAMILY CARD.
 */
public function create()
{
    // Render view
    $residents = Resident::get();
    return view('family.create', compact('residents'));
}

/**
 * Store a newly created FAMILY CARD in storage.
 */
public function store(Request $request)
{
    // Validate family card data
    $request->validate([
        'no_kk' => 'required|min:16',
        'resident_id' => 'required'
    ]);

    // Create family card
    $familyCard = FamilyCard::create([
        'no_kk' => $request->no_kk,
        'resident_id' => $request->resident_id
    ]);

    // Add family card details (members)
    $members = $request->input('members', []);
    $statuses = $request->input('statuses', []);

    foreach ($members as $key => $member) {
        FamilyCardDetail::create([
            'family_card_id' => $familyCard->id,
            'resident_id' => $member,
            'status' => $statuses[$key]
        ]);
    }

    // Redirect to family card index
    return redirect()->route('family.index');
}

/**
 * Display the specified FAMILY CARD.
 */
public function show($id)
{
    $familyCard = FamilyCard::with('details.resident')->findOrFail($id);
    return view('family.show', compact('familyCard'));
}

/**
 * Show the form for editing the specified FAMILY CARD.
 */
public function edit($id)
{
    // Find FamilyCard by ID
    $familyCard = FamilyCard::find($id);
    $residents = Resident::get();

    // Render view
    return view('family.edit', compact('familyCard', 'residents'));
}

/**
 * Update the specified FAMILY CARD in storage.
 */
// public function update(Request $request, $id)
// {
//     try {
//             // Find FamilyCard by ID
//         $familyCard = FamilyCard::find($id);

//         // Validate family card data
//         $data = $request->validate([
//             'no_kk' => 'required|min:16',
//             'resident_id' => 'required'
//         ]);

//         // Update family card
//         $familyCard->update([
//             'no_kk' => $data['no_kk'],
//             'resident_id' => $data['resident_id']
//         ]);
//         // Render view
//         return redirect()->route('family.index');
//     } catch (Error $error){
//         return view('404');
//     }
    

// }

// public function update(Request $request, $id)
// {
// // Validate input data
// $request->validate([
//     'no_kk' => 'required|min:16',
//     'resident_id' => 'required',
//     'members' => 'required|array|min:1',
//     'statuses' => 'required|array|min:1',
// ]);

// try {
//     // Find FamilyCard by ID
//     $familyCard = FamilyCard::findOrFail($id);

//     // Update FamilyCard basic information
//     $familyCard->update([
//         'no_kk' => $request->no_kk,
//         'resident_id' => $request->resident_id,
//     ]);

//     // Update or create FamilyCardDetails (members)
//     $members = $request->members;
//     $statuses = $request->statuses;

//     foreach ($members as $key => $member) {
//         $detail = FamilyCardDetail::updateOrCreate(
//             [
//                 'family_card_id' => $familyCard->id,
//                 'resident_id' => $member,
//             ],
//             [
//                 'status' => $statuses[$key],
//             ]
//         );
//     }

//     // Redirect to family card index
//     return redirect()->route('family.index')->with('success', 'Family Card updated successfully.');
// } catch (\Exception $e) {
//     return redirect()->back()->with('error', 'Failed to update Family Card. ' . $e->getMessage());
// }
// }

public function update(Request $request, $id)
{
    // Validate input data
    $request->validate([
        'no_kk' => 'required|min:16',
        'resident_id' => 'required',
        'members' => 'required|array|min:1',
        'statuses' => 'required|array|min:1',
    ]);

    try {
        // Find FamilyCard by ID
        $familyCard = FamilyCard::findOrFail($id);

        // Update FamilyCard basic information
        $familyCard->update([
            'no_kk' => $request->no_kk,
            'resident_id' => $request->resident_id,
        ]);

        // Update or create FamilyCardDetails (members)
        $members = $request->members;
        $statuses = $request->statuses;

        foreach ($members as $key => $member) {
            FamilyCardDetail::updateOrCreate(
                [
                    'family_card_id' => $familyCard->id,
                    'resident_id' => $member,
                ],
                [
                    'status' => $statuses[$key],
                ]
            );
        }

        // Delete FamilyCardDetails not in the updated list
        FamilyCardDetail::where('family_card_id', $familyCard->id)
            ->whereNotIn('resident_id', $members)
            ->delete();

        // Redirect to family card index
        return redirect()->route('family.index')->with('success', 'Family Card updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to update Family Card. ' . $e->getMessage());
    }
}


/**
 * Remove the specified FAMILY CARD from storage.
 */
public function destroy($id)
{
    try{
        // Find FamilyCard by ID
        $familyCard = FamilyCard::find($id);

        $familyCard->delete();

    } catch(Error $error){
        return view('404');
    }

    // Render view
    return redirect('/family');

}
}
