<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactusComponent extends Component
{
    public function render()
    {
        return view('livewire.contactus-component')->layout('layouts.base');
    }
}
