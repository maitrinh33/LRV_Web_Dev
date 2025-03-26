<?php

namespace App\Livewire;

use Livewire\Component;

class Header extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.navbar');
    }

    public function updatedSearch()
    {
        // Handle search logic here
    }
}