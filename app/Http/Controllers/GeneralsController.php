<?php

namespace App\Http\Controllers;

use App\Models\Generals;
use Illuminate\Http\Request;

class GeneralsController extends Controller
{
    public function edit()
    {
        $generals = Generals::first();
        return view('layouts.setting', compact('generals'));
    }
    
    public function update(Request $request)
    {
        $generals = Generals::first();

        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'head' => 'required',
            'deputy_head' => 'required',
            'treasurer' => 'required',
            'secretary' => 'required',
        ]);
        
        $generals->update($validated);

        return redirect()->route('general.edit');
    }
}
