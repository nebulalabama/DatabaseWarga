<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Error;
// use Hash

class UserController extends Controller
{
    /**
     * Display a listing of the USER.
     */
    public function index()
    {
        // Get all users
        $users = User::all();

        // Render view
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new USER.
     */
    public function create()
    {
        // Render view
        return view('users.create');
    }

    /**
     * Store a newly created USER in storage.
     */
    public function store(Request $request)
    {
        // Validate User
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:user,admin',
            'phone' => 'required',
            // 'status' => 'required|in:active,inactive',
        ]);
    
        // Store user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);
    
        // Redirect to users.index route (you may adjust this based on your route naming)
        return redirect('/dashboard/users')->with('success', 'Berhasil menambah User');
    }

    /**
     * Display the specified USER.
     */
    public function show($id)
    {
        // Find User by ID
        $user = User::find($id);

        // Render view
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified USER.
     */
    public function edit($id)
    {
        // Find User by ID
        $user = User::find($id);

        // Render view
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified USER in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Find User by ID
            $user = User::find($id);

            // Validate User
            $request->validate([
                'name' => 'required|min:5',
                'email' => 'required',
                // 'password' => 'required',
                'role' => 'required',
                'phone' => 'required',
                'status' => 'required'
            ]);

            // Update user
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                // 'password' => Hash::make($request->password),
                'role' => $request->role,
                'phone' => $request->phone,
                'status' => $request->status,
                'updated_at' => now()
            ]);

        } catch(Error $error) {
            return view('404');
        }
        
        // Render view
        return redirect('/dashboard/users');
    }

    /**
     * Remove the specified USER from storage.
     */
    public function destroy($id)
    {
        try{
            // Find User by ID
            $user = User::find($id);

            $user->delete();

        } catch(Error $error){
            return view('404');
        }

        // Render view
        return redirect('/dashboard/users');
    }
}
