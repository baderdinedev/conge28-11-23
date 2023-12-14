<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Datatables;

class ResponsableController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('responsable.dashboard', compact('user'));
    }

    public function getUsers(UsersDataTable $usersDataTable)
    {
        return $usersDataTable->render('responsable.user');
    }


    public function create()
    {
        $roles = Role::all();
        return view('employe.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role_id' => $validatedData['role_id'],
        ]);

        return redirect()->route('employe.list')->with('success', 'User created successfully');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('employe.show', compact('user'));
    }


    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('employe.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
            'role_id' => $validatedData['role_id'],
        ]);

        return redirect()->route('employe.list')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('employe.list')
            ->with('success', 'Employe deleted successfully');
    }


}
