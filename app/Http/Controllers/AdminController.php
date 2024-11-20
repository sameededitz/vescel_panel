<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function allAdmins()
    {
        $admins = User::where('role', 'admin')->get();
        return view('admin.all-admins', compact('admins'));
    }

    public function addAdmin()
    {
        return view('admin.add-admin');
    }

    public function editAdmin(User $user)
    {
        return view('admin.edit-admin', compact('user'));
    }

    public function deleteAdmin(Request $request, User $user)
    {
        $user->delete();
        return redirect()->route('all-admins')->with([
            'status' => 'success',
            'message' => 'Admin Deleted Successfully',
        ]);
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('all-users')->with([
            'status' => 'success',
            'message' => 'User Deleted Successfully',
        ]);
    }

    public function AllUsers()
    {
        $users = User::where('role', 'customer')
            ->get();;
        // dd($users);
        return view('admin.all-users', compact('users'));
    }

    public function addUser()
    {
        return view('admin.add-user');
    }

    public function editUser(User $user)
    {
        return view('admin.edit-user', compact('user'));
    }
}
