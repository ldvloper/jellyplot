<?php

namespace App\Http\Livewire\Navigation;

use Livewire\Component;
use Mobile_Detect;

class NavigationMenu extends Component
{
    public function search(){
        $this->dispatchBrowserEvent('toggle-spotlight');
    }
    public function render()
    {
        return view('livewire.navigation.navigation-menu');
    }
}
