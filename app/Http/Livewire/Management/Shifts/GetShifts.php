<?php

namespace App\Http\Livewire\Management\Shifts;

use App\Models\Shift;
use Livewire\Component;
use Livewire\WithPagination;

class GetShifts extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = "asc";
    public $orderBy = "from";
    public $perPage = 10;
    public $showTrashed = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchTerm = '%'.$this->search.'%';
        return view('livewire.management.shifts.get-shifts', [
            'shifts' => Shift::where('name', 'ilike', $searchTerm)
                ->orderBy($this->orderBy, $this->sortBy)
                ->withTrashed($this->showTrashed)
                ->paginate($this->perPage),
        ]);
    }

}
