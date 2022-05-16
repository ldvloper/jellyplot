<?php

namespace App\Http\Livewire\Projects\Helpers;

use App\Models\Project;
use Livewire\Component;

class GetProjectsByCustomer extends Component
{
    public $search = '';
    public $sortBy = "asc";
    public $orderBy = "reference";
    public $perPage = 10;
    public $showTrashed = false;
    public $customer;

    public function render()
    {
        $searchTerm = '%' . $this->search . '%';
        return view('livewire.projects.helpers.get-projects-by-customer', [
            'projects' => Project::query()->when($this->customer, function($query) use ($searchTerm) {
            $query->where('customer_id', $this->customer->id);
            })
            ->where('reference', 'ilike', $searchTerm)
            ->orderBy($this->orderBy, $this->sortBy)
            ->withTrashed($this->showTrashed)
            ->paginate($this->perPage)
            ]);
    }
}
