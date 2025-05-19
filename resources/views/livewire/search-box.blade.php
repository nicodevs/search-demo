<div>
    <input
        type="text"
        wire:model.defer="query"
        wire:keydown.enter="search"
        placeholder="Search products..."
        class="flex-1 border border-gray-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300"
    />
</div>
