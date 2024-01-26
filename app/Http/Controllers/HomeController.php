<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function checkPage(){
        if(Auth::user()->userType == "users" or Auth::user()->userType == "admin"){
            return redirect(Auth::user()->userType.'/home');
        }else{
            return redirect()->back();
        }
    }
    public function dashboard(){
        return Inertia::render("Dashboard");
        //dd(Auth::user()->userType);

    }
    public function adminPage(){
        return Inertia::render("Admin/Home");
    }
}
