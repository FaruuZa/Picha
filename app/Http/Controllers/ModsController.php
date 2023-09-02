<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Report;
use Illuminate\Http\Request;

class ModsController extends Controller
{
    public function index(){
        $reportedMessages = Report::with(['Message','Pelapor'])->get();
        // dd($reportedMessages);
        return view('mods.index', compact(['reportedMessages']));
    }
}
