<div class="p-6 space-y-6">
    @foreach($tables as $table)
        <button wire:click="tableSelected({{ $table->id }})" class="w-16 h-16 {{ $table->products->count() > 0 ? "bg-red-400" : "bg-blue-400" }}">{{ $table->id }}</button>
    @endforeach
</div>
