<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        $active = "login";
        return view('Auth.index', compact('active'));
    }
    public function register(){
        $active = "register";
        return view('Auth.index', compact('active'));
    }
}
