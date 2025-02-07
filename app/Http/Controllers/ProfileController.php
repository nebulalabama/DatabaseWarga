<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('pages.profile.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $profile = User::find(Auth::user()->id);
        $user = Auth::user();  // user yang sedang login
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $rules = [
            'name' => 'required|max:50',
            'email' => 'required|max:35',
            'role' => 'required|max:20',
            'phone' => 'required|max:20',
            'status' => 'required|enum'
        ];
        
        $validatedData = $request->validate($rules);
        $user = User::find(Auth::user()->id);
        $user->update($validatedData);
        return redirect()->route('dashboard.profile')->with('success', 'Profil telah berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Ini maksudny bukan menghapus keseluruhan data user yg sedang login kan kak? soalny malah kayak logout deh.. buat menghapus salah satu data aja bukan?   pake update aj bisa berarti?
        $user = Auth::user();  //

        return redirect()->route('dashboard.profile')->with('success', 'Data berhasil dihapus atau dikosongkan.');
    }

    public function edit_password()
    {
        $user = Auth::user();
        return view('pages.profile.ubah_password', compact('user'));
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:6|max:25',
            // 'new_repassword' => $request->new_password,
        ]);

        $user = auth()->user();

        // Memeriksa apakah password saat ini sesuai dengan yang di database
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama yg anda masukkan salah.']);
        }

        $data = User::find(Auth::user()->id);

        // Mengupdate password baru
        $data->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('success', 'Password berhasil diperbarui.');
    }
}