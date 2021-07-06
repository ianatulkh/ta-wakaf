<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Role Redirect
        switch(Auth::user()->role->nama_role){
            case "Admin":
                return redirect()->route('admin.home');

            case "Wakif":
                return redirect()->route('wakif.home');
        }

        return view('auth.login');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function persyaratan()
    {
        return view('page.berkas-persyaratan');
    }
}
