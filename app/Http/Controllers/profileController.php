<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index(User $User){
        return view('chat.profile', compact('User'));
    }
}
