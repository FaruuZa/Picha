<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(Room $Room){
        $rooms = Room::with('Messages')->get();
        $messages = $Room->Messages()->all();
        $messages->load('User');
        return view('chat.index', compact(['Room', 'rooms', 'messages']));
    }
    public function profile(User $User){
        return view('chat.profile', compact('User'));
    }
    public function sendMessage(Request $request, Room $Room){
        $Vmessage = $request->validate([
            'message' => 'required'
        ]);

        Message::create([
            'user_id' => Auth::user()->id,
            'room_id' => $Room->id,
            'message' => $Vmessage['message'],
        ]);
        return back();
    }
}
