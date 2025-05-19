<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;

class SearchResults extends Component
{
    public $results = [];

    public $type = 'products';

    #[On('search-keyword-changed')]
    public function search($query)
    {
        if ($this->type === 'products') {
            $endpoint = 'https://dummyjson.com/products/search?delay=3000&q=' . urlencode($query);
        } elseif ($this->type === 'posts') {
            $endpoint = 'https://dummyjson.com/posts/search?q=' . urlencode($query);
        } else {
            $endpoint = null;
        }

        if (!$endpoint) return;

        $response = Http::get($endpoint);

        if ($response->successful()) {
            $this->results = $response->json()[$this->type] ?? [];
        }
    }

    public function render()
    {
        return view('livewire.search-results');
    }
}
