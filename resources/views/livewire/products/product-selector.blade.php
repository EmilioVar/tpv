<div class="p-3">
    @forelse($products as $product)
        <button wire:click="productSelected({{ $product->id }})" class="w-20 h-20 cursor-pointer bg-blue-100" value="{{ $product->id }}">{{ $product->name }}</button>
    @empty
    <p>sin grupos, añadelos!</p>
    @endforelse
</div>