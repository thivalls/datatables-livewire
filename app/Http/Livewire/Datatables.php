<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Datatables extends Component
{
    use WithPagination;
    
    public $sorts = [];
    public $filters = [
        'search' => null
    ];

    public function sortBy ($column) {
        if(! isset($this->sorts[$column])) return $this->sorts[$column] = 'asc';
        if($this->sorts[$column] === 'asc') return $this->sorts[$column]  = 'desc';
        unset($this->sorts[$column]);
    }

    public function applySorting($query) {
        foreach($this->sorts as $field => $direction) {
            $query->orderBy($field, $direction);
        }
        return $query;
    }

    public function updatedFilters() {
        $this->resetPage();
    }

    public function runProductFilter() {
        $query = User::query()
                ->when($this->filters['search'], fn($query, $search) => $query->where("name", "like", "%$search%" ));
        return $this->applySorting($query);
    }

    public function render()
    {
        return view('livewire.datatables', [
            "users" => $this->runProductFilter()->paginate() ]
        );
    }
}
