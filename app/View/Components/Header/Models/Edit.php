<?php

namespace App\View\Components\Header\Models;

use Illuminate\View\Component;

class Edit extends Component
{
    public $object;
    public string $title, $department;
    public $price;
    public string $objects;
    public bool $task;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($object, $title,$department, $price, $objects, $task)
    {
        $this->object = $object;
        $this->title = $title;
        $this->department = $department;
        $this->price = $price;
        $this->objects = $objects;
        $this->task = $task;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header.models.edit');
    }
}
