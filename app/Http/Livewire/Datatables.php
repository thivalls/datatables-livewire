<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Datatables extends Component
{
    use WithPagination;
    
    public function render()
    {
        return view('livewire.datatables', ["users" => User::paginate(10)]);
    }
}
