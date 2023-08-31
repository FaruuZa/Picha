<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $searched = $request->query('search');
        if (Str::length($searched) > 0) {
            $messages = Message::with('User')->where('message', 'like', '%' . $searched . '%')->get();
        } else {
            $messages = Message::with('User')->get();
        }
        return view('chat.index', compact(['messages', 'searched']));
    }
    public function sendMessage(Request $request)
    {
        $Vmessage = $request->validate([
            'message' => 'required'
        ]);

        Message::create([
            'user_id' => Auth::user()->id,
            'message' => $Vmessage['message'],
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

    public function changePP(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // dd($request);
        $imageName = '/user/' .Auth::user()->id . Auth::user()->name . '.' . $request->image->extension();
        $request->image->move(public_path('img/user'), $imageName);
        
        User::where('id', Auth::user()->id)->update([
            'image' => $imageName
        ]);
        return back();
    }
}
