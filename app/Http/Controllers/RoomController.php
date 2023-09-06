<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function generateUniqueCode()
    {

        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);
        $codeLength = 6;

        $code = '';

        while (strlen($code) < 6) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code . $character;
        }

        if (Room::where('code', $code)->exists()) {
            $this->generateUniqueCode();
        }

        return $code;
    }
    public function createRoom(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required'
        ]);

        Room::create([
            'name' => $request->name,
            'member' => Auth::user()->unique,
            'owner' => Auth::user()->id,
            'code' => $this->generateUniqueCode()
        ]);
    }
}
