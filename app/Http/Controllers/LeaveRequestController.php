<?php

namespace App\Http\Controllers;

use App\DataTables\LeaveRequestDataTable;
use Illuminate\Http\Request;
use App\Models\LeaveRequest;

class LeaveRequestController extends Controller
{

    public function index(LeaveRequestDataTable $LeaveRequestDataTable)
    {

        return $LeaveRequestDataTable->render('responsable.leaveRequest');
    }
    public function create()
    {
        return view('leave-request.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string',
            'type' => 'required|in:autorisation,conge',
        ]);

        $leaveRequest = auth()->user()->leaveRequests()->create([
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'reason' => $request->input('reason'),
            'type' => $request->input('type'),
            'status' => 'en_attente',
        ]);

        return redirect()->route('dashboard')->with('success', 'Leave request created successfully');
    }

    public function approveLeave($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->status = 'approved';
        $leaveRequest->save();
        return redirect()->route('leave-requests.list', $leaveRequest->user_id)
            ->with('success', 'Leave request approved successfully');
    }

    public function rejectLeave($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->status = 'reject';
        $leaveRequest->save();
        return redirect()->route('leave-requests.list', $leaveRequest->user_id)
            ->with('success', 'Leave request Rejected successfully');
    }
}
