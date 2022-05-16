<?php

namespace App\Http\Livewire\Management\Scheduler\Holidays;

use App\Models\Department;
use App\Models\Holiday;
use App\Models\Position;
use Livewire\Component;
use Livewire\WithPagination;

class GetHolidays extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = "asc";
    public $orderBy = "name";
    public $perPage = 10;
    public $showTrashed = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchTerm = '%'.$this->search.'%';
        return view('livewire.management.scheduler.holidays.get-holidays', [
            'holidays' => Holiday::where('name', 'ilike', $searchTerm)
                ->orderBy($this->orderBy, $this->sortBy)
                ->withTrashed($this->showTrashed)
                ->paginate($this->perPage),
        ]);
    }
}
