<?php

namespace App\Http\Controllers;

use App\DataTables\RoleDataTable;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(RoleDataTable $roleDataTable)
    {

        return $roleDataTable->render('roles.index');
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);

        Role::create([
            'name' => $request->input('name'),

        ]);

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.show', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        ]);

        $role->update($validatedData);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}

