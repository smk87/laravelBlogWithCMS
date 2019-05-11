<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Users\UpdateProfileRequest;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->withusers(User::all());
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin'; // Change role to admin

        $user->save();

        session()->flash('success', 'User made admin successfully.');

        return redirect()->route('users.index');
    }

    public function edit()
    {
        return view('users.edit')->with('user', auth()->user());
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);

        session()->flash('success', 'User updated successfully.');

        return redirect()->back();
    }
}