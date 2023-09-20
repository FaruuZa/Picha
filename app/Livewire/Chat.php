<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Chat extends Component
{
    use WithPagination;

    public $Room;
    public $search = '';
    public $message;

    public function mount(Room $Room)
    {
        $this->Room = $Room;
        if (!$this->isMember()) {
            return redirect('/join/'.$Room->code);
        }

    }
    public function isMember()
    {
        $members = explode('|', $this->Room->member);
        if (in_array(Auth::user()->id . Auth::user()->email, $members)) {
            return true;
        } else {
            return false;
        }
    }
    public function send(){
        Message::create([
            'user_id' => Auth::user()->id,
            'room_id' => $this->Room->id,
            'message' => $this->message

        ]);
        $this->message = '';

    }

    public function kirimSearch(){
        $this->dispatch('ngesearch', $this->search);
    }

    public function batalSearch(){
        $this->search = '';
        $this->dispatch('ngesearch', $this->search);
    }

    public function render()
    {
        $Room = $this->Room;
        $messages = Message::with('User')->where('room_id', $Room->id)->get();
        $search = $this->search;
        // dd([$Room, $messages]);
        return view('livewire.chat', compact(['Room', 'messages', 'search']));
    }

}
