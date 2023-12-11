<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class EmployeeLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/employee/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('employe.login');
    }

    protected function guard()
    {
        return \Auth::guard('web'); // Use the 'web' guard for employee authentication
    }
}
