<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        return view('ndelok');
    }

    public function edit()
    {
        return view('ndelok_edit');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $user->update($validatedData);

        return redirect()->route('ndelok.show')->with('success', 'Profile updated successfully!');
    }
}
