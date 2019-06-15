<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');;
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        }

//        return redirect()->back()->withInput($request->only('email','remember'));
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
