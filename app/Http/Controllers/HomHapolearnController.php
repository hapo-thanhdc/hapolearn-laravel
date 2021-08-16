<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomHapolearnController extends Controller
{
    public function index()
    {
        return view('hapolearn');
    }
}
