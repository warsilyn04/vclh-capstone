<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Room as RoomModel;

class Room extends Component
{
    public function render()
    {
        return view('livewire.room', [
            'rooms' => RoomModel::all(),
        ]);
    }
}
