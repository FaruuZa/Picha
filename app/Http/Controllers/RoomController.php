<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $code = $this->generateUniqueCode();
        Room::create([
            'name' => $request->name,
            'member' => Auth::user()->email,
            'owner' => Auth::user()->id,
            'code' => $code,
            'password' => strlen($request->password) > 0 ? Hash::make($request->password) : ''
        ]);
        return redirect('/chat/'.$code);
    }
    public function joinRoom(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
        ]);

        $tujuan = Room::where('code', $validated['code'])->first();
        // dd($tujuan);
        if ($tujuan) {
            $members = explode('|', $tujuan->member);
            if (!in_array(Auth::user()->email, $members)) {
                if ($tujuan->password != null) {
                    $validated = $request->validate([
                        'code' => 'required',
                        'password' => 'required'
                    ]);
                    if(Hash::check($validated['password'], $tujuan->password)){
                        array_push($members, Auth::user()->email);
                    }else{
                        return back()->with('errPass', 'password salah');
                    }

                } else {
                    array_push($members, Auth::user()->email);
                }
                $mem2 = implode('|', $members);
                Room::where('code', $validated['code'])->update([
                    'member' => $mem2
                ]);
            }
            return redirect('/chat/'. $request->code);
        }
        return back()->with('noRoom', 'Room tidak ditemukan');
    }
}
