<?php

namespace App\Livewire;

use Livewire\Attributes\Isolate;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;

#[Isolate]
class SearchResults extends Component
{
    public $results = [];

    public $type = 'products';

    public $endpoint = '';

    #[On('search-keyword-changed')]
    public function search($query)
    {
        if ($this->type === 'users') {
            $this->results = [
                ['title' => 'Manager'],
                ['title' => 'Developer'],
                ['title' => 'Designer'],
                ['title' => 'Analyst'],
                ['title' => 'Administrator']
            ];

            return;
        }

        if ($this->type === 'products') {
            $this->endpoint = 'https://dummyjson.com/products/search?delay=3000&q=' . urlencode($query);
        } elseif ($this->type === 'posts') {
            $this->endpoint = 'https://dummyjson.com/posts/search?q=' . urlencode($query);
        } elseif ($this->type === 'todos') {
            $this->endpoint = 'https://jsonplaceholder.typicode.com/todos';
        } elseif ($this->type === 'recipes') {
            $this->endpoint = 'https://dummyjson.com/recipes/search?delay=5000&q=pizza';
        } else {
            $this->endpoint = null;
        }

        if (!$this->endpoint) return;

        $response = Http::get($this->endpoint);

        if ($response->successful()) {
            if ($this->type === 'todos') {
                $this->results = collect($response->json())->take(5)->toArray();
            } else {
                $this->results = $response->json()[$this->type] ?? [];
            }
        }
    }

    public function render()
    {
        return view('livewire.search-results');
    }
}
