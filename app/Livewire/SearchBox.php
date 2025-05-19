<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBox extends Component
{
    public $query = '';

    public function search()
    {
        $this->dispatch('search-keyword-changed.products', $this->query);
        $this->dispatch('search-keyword-changed.posts', $this->query);
    }

    public function render()
    {
        return view('livewire.search-box');
    }
}
