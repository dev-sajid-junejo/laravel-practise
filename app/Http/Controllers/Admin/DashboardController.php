<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function viewusers($id)
    {
        $users = User::find($id);
        return view('admin.users.view', compact('users'));
    }

    public function editUsers($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));

    }

    public function updateUsers(Request $request, $id)
    {
        $user = User::find($id);
        // Update the user data
        $user->name = $request->input('name');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->pincode = $request->input('pincode');
        $user->role_as = $request->input('role_as'); 
        $user->update();
        // Redirect back with a success message
        return redirect()->route('users')
            ->with('status', 'User updated successfully!');
    }
}
