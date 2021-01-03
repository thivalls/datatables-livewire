<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Datatables extends Component
{
    use WithPagination;
    
    public $filters = [
        'search' => null
    ];

    public function updatedFilters() {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.datatables', [
            "users" => 
                User::query()
                ->when($this->filters['search'], fn($query, $search) => $query->where("name", "like", "%$search%" ))
                ->paginate()]
        );
    }
}
