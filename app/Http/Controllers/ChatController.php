<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(){

        $messages = Message::with('User')->get();

        return view('chat.index', compact(['messages']));
    }
    public function sendMessage(Request $request){
        $Vmessage = $request->validate([
            'message' => 'required'
        ]);

        Message::create([
            'user_id' => Auth::user()->id,
            'message' => $Vmessage['message'],
        ]);
        return back();
    }
    public function deleteMessage(Request $request){
        Message::where('id', $request->id)->delete();
        return back()->with('deleted', 'message deleted');
    }
}
