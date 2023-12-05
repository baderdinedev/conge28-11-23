<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Datatables;

class ResponsableController extends Controller
{
    public function index()
    {
        return view('responsable.dashboard');
    }

    public function getUsers(UsersDataTable $usersDataTable)
    {
        return $usersDataTable->render('responsable.user');
    }






}
