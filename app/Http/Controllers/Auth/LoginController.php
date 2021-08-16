<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class LoginController extends Controller
{
    // protected $redirectTo = '/hapo';
    public function userLogin(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('email', $req->username)->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            return response()->json(['error_message' => 'Username or password is not match'], 401);
        }
        $req->session()->put('user', $user);
        return response()->json(['success' => 'asdasda']);
    }

    public function userLogout(Request $req)
    {
        $req->session()->forget('user');
        return redirect()->route('home');
    }
}
