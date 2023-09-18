<?php

namespace App\Livewire;

use Livewire\WithPagination;
use App\Models\Message;
use App\Models\Room;
use Livewire\Component;

class ShowMessages extends Component
{
    use WithPagination;
    public $Room;
    public $banyak;

    public function mount()
    {
        $this->banyak = 10;
    }

    public function render()
    {
        return view('livewire.show-messages', [
            'messages' => Message::with('User')->where('room_id', $this->Room->id)->latest()->paginate($this->banyak),
            // 'Room' => Room::where('id', $this->room_id)->get()
        ]);
    }

    public function tambah(){
        $this->banyak += 5;
    }
}
