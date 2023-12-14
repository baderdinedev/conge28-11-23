<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class EmployeLeaveRequestController extends Controller
{
    public function edit($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        return view('employe.userleaverequest.edit', compact('leaveRequest'));
    }

    public function update(Request $request, $id)
    {

        $leaveRequest = LeaveRequest::findOrFail($id);

        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string',
            'type' => 'required|in:autorisation,conge',
        ]);

        $leaveRequest->update($validatedData);

        return redirect()->route('leaveRequests.list')->with('success', 'Leave Request updated successfully');
    }

    public function destory($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->delete();
        return redirect()->route('leaveRequests.list')->with('success', 'Leave Request Deleted successfully');
    }
}
