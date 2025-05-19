<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchPage extends Component
{
    public $query = '';

    public $results = [
        'products' => [],
        'posts' => [],
    ];

    public function search()
    {
        $endpoints = [
            'products' => 'https://dummyjson.com/products/search?delay=3000&q=',
            'posts' => 'https://dummyjson.com/posts/search?q=',
        ];

        foreach ($endpoints as $type => $endpoint) {
            $this->results[$type] = Http::get($endpoint . urlencode($this->query))->json()[$type] ?? [];
        }
    }

    public function render()
    {
        return view('livewire.search-page');
    }
}
