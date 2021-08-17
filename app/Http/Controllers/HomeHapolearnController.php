<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeHapolearnController extends Controller
{
    public function index()
    {
        return view('hapolearnweb');
    }
}
