<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RoomController extends Controller
{
    // function index yang dijalankan untuk menampilkan room yang sudah user masukkan
    public function index(){
        // mengembalikan user ke tampilan welcome
        return view('welcome');
    }

    // function untuk meng-Generate kode unik
    public function generateUniqueCode()
    {
        // variable 'characters' yang berisi karakter yang akan digunakan untuk meng-Generate kode unik
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);
        //panjang dari kode yang ingin generate
        $codeLength = 6;

        // variable kosong untuk menyimpan kode unik
        $code = '';

        // perulangan yang menggunakan panjang dari variable code sebagai kondisi
        while (strlen($code) < 6) {
            // mengambil posisi random dari angka 0 sampai banyak karakter -1
            $position = rand(0, $charactersNumber - 1);
            // mengambil karakter (1) dari string characters
            $character = $characters[$position];
            // menambahkan code dengan character yang sudah didapat
            $code = $code . $character;
        }
        // mengecek apakah di dalam tabel room terdapat kolom code yang nilai nya seperti kode yang dibuat
        if (Room::where('code', $code)->exists()) {
            // jika ada, akan mengerjakan ulang fungsi
            $this->generateUniqueCode();
        }
        // jika tidak, maka akan mengembalikan nilai kode yang didapat
        return $code;
    }

    // function membuat room
    public function createRoom(Request $request)
    {
        // validasi
        $validated = $request->validate([
            'name' => 'required'
        ]);
        // membuat kode unik
        $code = $this->generateUniqueCode();
        // membuat room
        Room::create([
            'name' => $request->name,
            'member' => Auth::user()->id . Auth::user()->email,
            'owner' => Auth::user()->id,
            'code' => $code,
            'password' => strlen($request->password) > 0 ? Hash::make($request->password) : '',
            'public' => $request->public ? $request->public : 'false'
        ]);
        // mengembalikan user ke route /chat/(kode_Room)
        return redirect('/chat/'.$code);
    }

    // function untuk masuk room
    public function joinRoom(Request $request)
    {
        // validasi
        $validated = $request->validate([
            'code' => 'required',
        ]);

        // mencari tujuan room
        $tujuan = Room::where('code', $validated['code'])->first();
        // mengecek apakah room tersebut ada
        if ($tujuan) {
            // jika ada mengExplode atau mengconvert dari string data|data|data menjadi array ['data','data','data']
            $members = explode('|', $tujuan->member);
            // mengecek apakah di array members tidak terdapat user
            if (!in_array(Auth::user()->id . Auth::user()->email, $members)) {
                // jika iya, mengecek apakah room tersebut memiliki password
                if ($tujuan->password != null) {
                    // jika iya memvalidasi apakah ada password yang diberikan user
                    $validated = $request->validate([
                        'code' => 'required',
                        'password' => 'required'
                    ]);
                    // mengecek apakah password yang diberikan user sama dengan password room
                    if(Hash::check($validated['password'], $tujuan->password)){
                        // jika iya, memasukkan email user ke array members
                        array_push($members, Auth::user()->id . Auth::user()->email);
                    }else{
                        // jika tidak, mengembalikan user ke halaman sebelumnya dengan membawa 'errPass' yang disimpan di session
                        return back()->with('errPass', 'password salah');
                    }

                } else {
                    // jika tidak, memasukkan email user ke array members
                    array_push($members, Auth::user()->id . Auth::user()->email);
                }
                // mengubah array members menjadi string/pipe
                $mem2 = implode('|', $members);
                // mengUpdate kolom member pada Room
                Room::where('code', $validated['code'])->update([
                    'member' => $mem2
                ]);
            }
            // mengembalikan user ke room yang dituju
            return redirect('/chat/'. $request->code);
        }
        // jika room tidak ditemukan, mengembalikan user ke halaman sebelumnya
        return back()->with('noRoom', 'Room tidak ditemukan');
    }

    // halaman join room
    function wantJoin(Room $Room){
        // mengecek apakah room tersebut sama
        if ($Room) {
            // mengubah string/pipe pada kolom member menjadi array
            $members = explode('|', $Room->member);
            // mengecek apakah user tidak ada di array members
            if (!in_array(Auth::user()->id . Auth::user()->email, $members)) {
                // jika iya, mengembalikan user ke halaman joinRoom di folder chat dengan membawa variabel $Room dan $members
                return view('chat.joinRoom', compact(['Room', 'members']));
            }else{
                // jika tidak, mengembalikan user ke halaman chat
                return redirect('/chat/'.$Room->code);
            }
        }
        else{
            // jika tidak, mengembalikan user ke route '/' atau halaman awal
            return redirect('/');
        }
    }
}
