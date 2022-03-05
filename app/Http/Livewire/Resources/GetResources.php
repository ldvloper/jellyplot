<?php

namespace App\Http\Livewire\Resources;

use App\Models\Department;
use App\Models\Resource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use PHPUnit\Framework\Reorderable;

class GetResources extends Component
{
    use WithPagination;

    public $resource;
    public $search = '';
    public $sortBy = "asc";
    public $orderBy = "order_planning";
    public $perPage = 10;
    public $showTrashed = false;

    public function restore($resource)
    {
        Resource::withTrashed()
            ->where('id', $resource)
            ->restore();
        $result = Resource::where('id', $resource)->first();

        //Alert Here

    }

    public function updateResourceOrder($list)
    {
        foreach($list as $item)
        {
            Resource::withTrashed()->find($item['value'])->update(['order_planning' => $item['order']]);
        }
    }

    /**
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application
    {
        $searchTerm = '%' . $this->search . '%';

        $department = auth()->user()->currentTeam->department;

        $resources = Resource::query()->when($department, function($query) use ($department) {
            $query->where('department_id', $department->id);
        })
            ->where('name', 'like', $searchTerm)
            ->orderBy($this->orderBy, $this->sortBy)
            ->withTrashed($this->showTrashed)
            ->paginate($this->perPage);

        return view('livewire.resources.get-resources',[
            'resources' => $resources,
        ]);
    }
}
