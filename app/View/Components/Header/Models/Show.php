<?php

namespace App\View\Components\Header\Models;

use Illuminate\View\Component;
use PhpParser\Node\Expr\Cast\Object_;

class Show extends Component
{
    public $object;
    public $title, $department;
    public $price;
    public bool $task;
    public string $objects;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($object, $title,$department, $price, $objects,$task)
    {
        $this->object = $object;
        $this->title = $title;
        $this->department = $department;
        $this->price = $price;
        $this->task = $task;
        $this->objects = $objects;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header.models.show');
    }
}
