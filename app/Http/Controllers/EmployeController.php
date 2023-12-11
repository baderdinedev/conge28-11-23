<?php

namespace App\Http\Controllers;

use App\DataTables\UserLeaveRequestDataTable;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeController extends Controller
{
    public function index(UserLeaveRequestDataTable $dataTable)
    {
        return $dataTable->render('employe.dashboard');
    }

    public function show($id)
    {
        $leaveRequests = LeaveRequest::findOrFail($id);
        return view('employe.userleaverequest.index', compact('leaveRequests'));
    }

}
