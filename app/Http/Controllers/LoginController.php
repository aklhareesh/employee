<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function doLogin(LoginRequest $request)
    {
        $val = $request->validated();

       // $input = request()->only('email', 'password');
        if (auth()->attempt($val)) {
            return redirect('company');
        } else
            return redirect('login')->with('msg','Login is Invalid');
    }
}
