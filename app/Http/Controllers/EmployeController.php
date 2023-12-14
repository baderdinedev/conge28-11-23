<?php

namespace App\Http\Controllers;

use App\DataTables\UserLeaveRequestDataTable;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EmployeController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        return view('employe.dashboard', compact('user'));
    }

    public function getLeaveRequests(UserLeaveRequestDataTable $dataTable)
    {
        return $dataTable->render('employe.leave-requests');
    }

    public function show($id)
    {
        $leaveRequests = LeaveRequest::findOrFail($id);
        return view('employe.userleaverequest.index', compact('leaveRequests'));
    }

    // Employee info Update

    public function edit()
    {
        $user = Auth::user();
        return view('employe.info.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
        ]);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
        ]);

        return redirect()->route('dashboard')->with('success', 'User updated successfully');
    }

}
