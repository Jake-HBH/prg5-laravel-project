<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
// alle users ophalen uit de database
        $users = User::withCount('animals')->get();

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
// edit form laten zien van een user
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
// valideren en update van user details
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'status' => 'required|boolean',
        ]);

        $user->update($request->only('name', 'email', 'status')); // update van user details

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete(); // verwijderen user
        return redirect()->route('admin.users.index'); // redirect naar de user list na verwijdering
    }

    public function activate(User $user)
    {
        $user->status = 1;
        $user->save();

        return redirect()->route('admin.users.index');
    }

    public function deactivate(User $user)
    {
        $user->status = 0;
        $user->save();

        return redirect()->route('admin.users.index');
    }
}
