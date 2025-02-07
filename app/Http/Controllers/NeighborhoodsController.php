<?php

namespace App\Http\Controllers;
use App\Models\Neighborhoods;

use Illuminate\Http\Request;

class NeighborhoodsController extends Controller
{
    //
    public function index()
    {
        $neighborhoods = Neighborhoods::all();
        return view('neighborhoods.index', compact('neighborhoods'));
    }

    public function create()
    {
        return view('neighborhoods.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_rt' => 'required',
            'head' => 'required|string'
        ]);

        Neighborhoods::create([
            'name' => $validated['no_rt'],
            'head' => $validated['head'],
        ]);

        return redirect()->route('neighborhoods.index');
    }

    public function show($id)
    {
        $neighborhoods = Neighborhoods::find($id);
        return view('neighborhoods.show', compact('neighborhoods'));
    }

    public function edit($id)
    {
        $neighborhoods = Neighborhoods::find($id);
        return view('neighborhoods.edit', compact('neighborhoods'));
    }

    public function update(Request $request, $id)
    {

        $neighborhoods = Neighborhoods::find($id);

        $validated = $request->validate([
            'no_rt' => 'required',
            'head' => 'required|string'
        ]);

        $neighborhoods->update([
            'name' => $validated['no_rt'],
            'head' => $validated['head'],
        ]);

        return redirect()->route('neighborhoods.index');
        
    }

    public function destroy($id)
    {
        $neighborhoods = Neighborhoods::find($id);
        $neighborhoods->delete();
        
        return redirect()->route('neighborhoods.index');
    }
}
