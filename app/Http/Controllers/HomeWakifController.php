<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeWakifController extends Controller
{
    public function index()
    {
        $wakif = auth()->user()->wakif;
        return view('wakif.home', compact('wakif'));
    }
}
