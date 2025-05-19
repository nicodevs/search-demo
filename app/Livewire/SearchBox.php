<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBox extends Component
{
    public $query = '';

    public function search()
    {
        $this->dispatch('search-keyword-changed', $this->query);
    }

    public function render()
    {
        return view('livewire.search-box');
    }
}
