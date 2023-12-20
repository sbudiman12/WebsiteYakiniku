<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profil');
    }

    public function edit()
    {
        return view('profil_edit');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20', // Adjust the validation rule according to your needs
        ]);

        $user->update($validatedData);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}
