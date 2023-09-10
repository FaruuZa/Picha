<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SendMessage extends Component
{
    public $message;
    public $roomId;

    public function render()
    {
        return view('livewire.send-message');
    }

    public function send(){
        Message::create([
            'user_id' => Auth::user()->id,
            'room_id' => $this->roomId,
            'message' => $this->message

        ]);
        $this->message = '';

        $this->dispatch('messageSended')->to(ShowMessages::class);
    }
}
