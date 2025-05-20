<div class="my-4 p-4 border border-gray-300 rounded-xl">
    <pre class="bg-amber-200 mb-2">search-results</pre>

    <div class="text-xl font-semibold mb-4">
        {{ $type }} / <pre>{{ $endpoint }}</pre>
    </div>

    @if(count($results))
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($results as $item)
                <div class="bg-white shadow rounded-xl p-4">
                    <h2 class="text-lg font-bold mb-2">
                        {{ $item['title'] ?? $item['name'] ?? 'Untitled' }}
                    </h2>

                    @if($type === 'products')
                        <p class="text-gray-700 text-sm mb-1">Price: ${{ $item['price'] ?? 'N/A' }}</p>
                        <p class="text-gray-600 text-sm">{{ $item['description'] ?? '' }}</p>
                    @elseif($type === 'posts')
                        <p class="text-gray-600 text-sm">{{ $item['body'] ?? '' }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">No results found.</p>
    @endif
</div>
