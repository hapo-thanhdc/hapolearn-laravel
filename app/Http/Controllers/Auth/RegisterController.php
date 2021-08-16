<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function userRegister(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'repeat' => 'required'
        ]);
        if ($req->password !== $req->repeat) {
            return response()->json(['error' => 'Password do not match']);
        }
        $user = new User;
        $user->name = $req->username;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        if ($user->save()) {
            return response()->json(['status' => 'success']);
        };
        return response()->json($req->all());
    }
}
