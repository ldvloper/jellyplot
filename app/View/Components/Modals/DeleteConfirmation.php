<?php

namespace App\View\Components\Modals;

use Illuminate\View\Component;

class DeleteConfirmation extends Component
{

    public $action;
    /**
     * The object name.
     *
     * @var string
     */
    public $objectName;

    public $object;
    /**
     * The alert message.
     *
     * @var string
     */
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $message, $object, $objectName)
    {
        $this->action = $action;
        $this->object = $object;
        $this->objectName = $objectName;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.delete-confirmation');
    }
}
