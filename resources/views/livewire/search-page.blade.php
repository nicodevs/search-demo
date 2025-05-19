<div class="my-4 p-4 border border-gray-300 rounded-xl">
    <pre class="bg-amber-200 mb-2">search-page</pre>

    <input
        type="text"
        wire:model.defer="query"
        wire:keydown.enter="search"
        placeholder="Search products..."
        class="flex-1 border border-gray-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300"
    />

    @foreach($results as $source => $items)
        <div class="p-4">
            <div class="text-lg font-semibold mb-4 capitalize">
                {{ $source }}
            </div>
            @if(count($items))
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($items as $item)
                        <div class="bg-white shadow rounded-xl p-4">
                            <h2 class="text-lg font-bold mb-2">
                                {{ $item['title'] ?? 'Untitled' }}
                            </h2>
                            @if(isset($item['price']))
                                <p class="text-gray-700 text-sm mb-1">Price: ${{ $item['price'] ?? 'N/A' }}</p>
                                <p class="text-gray-600 text-sm">{{ $item['description'] ?? '' }}</p>
                            @else
                                <p class="text-gray-600 text-sm">{{ $item['body'] ?? '' }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No results found.</p>
            @endif
        </div>
    @endforeach
</div>
