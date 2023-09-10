<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;

class ShowMessages extends Component
{
    public $roomId;
    #[On('messageSended')]
    public function render()
    {
        return view('livewire.show-messages', [
            'messages' => Message::where('room_id', $this->roomId)->latest()->get()
        ]);
    }
}
