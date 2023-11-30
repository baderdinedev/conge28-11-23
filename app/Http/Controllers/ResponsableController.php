<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Datatables;

class ResponsableController extends Controller
{
    public function index()
    {
        return view('responsable.dashboard');
    }

    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $user_id = 2;

            $data = User::where('user_id', $user_id)->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return response()->json(['message' => 'Unauthorized.'], 403);
    }



}
