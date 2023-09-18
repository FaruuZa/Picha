<?php

namespace App\Livewire;

use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\Component;

class JoinedRooms extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $joinedRooms = Room::where('member', 'LIKE', '%' . Auth::user()->id . Auth::user()->email .'%')->paginate(10);
        return view('livewire.joined-rooms', compact(['joinedRooms']));
    }
}
