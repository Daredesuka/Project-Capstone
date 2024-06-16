<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    public function showFormLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }
        return view('admin.login.login');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            // 'g-recaptcha-response' => 'required|captcha',

        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $data = array($fieldType => $input['username'], 'password' => $input['password']);
        if (auth()->attempt($data)) {
            $username = auth()->user()->username;
            $status = auth()->user()->status;
            $ldate = date('Y-m-d H:i:s');
            $user_id = Auth::user()->id;
            return redirect()->route('dashboard.index')->with(['success' => 'Welcome back ' . $username]);
        } else {
            return redirect()->back()->with(['error' => 'Invalid email or password']);
        }
    }

    public function logout(Request $request)
    {


        Auth::logout();
        Session::flush();
        return redirect()->route('login')->with(['success' => 'You have successfully logged out']);
    }
}