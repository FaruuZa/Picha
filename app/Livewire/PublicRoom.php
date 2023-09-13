<?php

namespace App\Livewire;

use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PublicRoom extends Component
{
    public $search = '';
    public function render()
    {
        $publicRooms = Room::where([['public', 'true'],['member', 'NOT LIKE','%' . Auth::user()->email . '%'], ['name', 'like', '%' . $this->search . '%']])->get();
        return view('livewire.public-room', compact([
            'publicRooms'
        ]));
    }
}
