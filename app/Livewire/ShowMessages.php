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
    public $search = '';
    protected $listeners = ['ngesearch'];

    public function ngesearch($searched){
        $this->search = $searched;
    }

    public function mount()
    {
        $this->banyak = 10;
    }

    public function render()
    {
        // dd($this->listeners);
        return view('livewire.show-messages', [
            'messages' => Message::with('User')->where([['room_id', $this->Room->id], ['message', 'LIKE', '%' . $this->search . '%' ]])->latest()->paginate($this->banyak),
        ]);
    }

    public function tambah(){
        $this->banyak += 5;
    }
}
