<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registration; 
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{


    public function showAdminLoginForm()
    {
        return view('login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('registration')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('dash');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
