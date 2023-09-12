<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Report;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function index(Room $Room, Request $request)
    {
        if ($Room) {
            // dd($Room);
            $isMember = false;
            $members = explode('|', $Room->member);
            if (in_array(Auth::user()->email, $members)) {
                $isMember = true;
            } else {
                $isMember = false;
            }
            if ($isMember) {
                $searched = $request->query('search');
                if (Str::length($searched) > 0) {
                    $messages = Message::with('User')->where([['room_id', '=', $Room->id], ['message', 'like', '%' . $searched . '%']])->latest()->paginate(10);
                } else {
                    $messages = Message::with('User')->where([['room_id', '=', $Room->id]])->latest()->paginate(10);
                }
                $messages->lastPage();
                $path = $request->path();
                // dd($path);
                return view('chat.index', compact(['messages', 'searched', 'path', 'Room']));
            } else {
                return redirect('joinRoom');
            }
        }
        return redirect('/');
    }
    public function showMessages(Room $Room)
    {
        $messages = Message::with('User')->where([['room_id', '=', $Room->id]])->latest()->paginate(10);
        $messages->lastPage();
        return view('chat.messages', compact(['messages', 'Room']));
    }
    public function sendMessage(Room $Room, Request $request)
    {
        $Vmessage = $request->validate([
            'message' => 'required'
        ]);
        Message::create([
            'user_id' => Auth::user()->id,
            'message' => $Vmessage['message'],
            'room_id' => $Room->id
        ]);
        return back();
    }
    public function deleteMessage(Request $request)
    {
        Message::where('id', $request->id)->delete();
        return back()->with('deleted', 'message deleted');
    }

    public function editMessage(Request $request)
    {
        $validated = $request->validate([
            'pesan' => 'required'
        ]);

        Message::where('id', $request->id)->update([
            'message' => $validated['pesan']
        ]);

        return back()->with('edited', 'message edited');
    }

    public function editProfile(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required'
        ]);
        $imageName = 'user/' . Auth::user()->id . Auth::user()->name . '.' . $request->image->extension();
        $request->image->move(public_path('img/user'), $imageName);

        User::where('id', Auth::user()->id)->update([
            'image' => $imageName,
            'name' => $request->name
        ]);
        return back();
    }

    public function report(Request $request)
    {
        if ($request->apa == 'user') {
            Report::create([
                'user_id' => $request['id'],
                'reason' => $request['reason'],
                'reporter' => Auth::user()->name
            ]);
        } elseif ($request->apa == 'pesan') {
            Report::create([
                'message_id' => $request['id'],
                'reason' => $request['reason'],
                'reporter' => Auth::user()->name
            ]);
        }
        return back()->with('reported', 'that message has been reported');
    }
}
