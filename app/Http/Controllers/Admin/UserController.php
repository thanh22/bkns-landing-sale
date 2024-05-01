<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @param UserService $userService
     */
    public function __construct(){}

    public function login()
    {
        return view('admins.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin-index');
        } else {
            return redirect()->back()->with('error', 'email or password is incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
