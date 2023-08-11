<x-layout>
    <div class="container-full flex flex-wrap">
        <!-- items count -->
        <div id="items-screen" class="bg-red-400">
            <h1 class="">pantalla</h1>
        </div>
        <!-- keyboard -->
        <div id="keyboard" class="bg-blue-400">
            <h1 class="">keyboard</h1>
        </div>
        <!-- groups -->
        <div id="groups" class="bg-green-400">
            <h1 class="">groups</h1>
            <livewire:groups.group-selector :groups="$groups"/>
        </div>
        <!-- products -->
        {{-- <div id="products" class="bg-orange-400">
            <h1 class="">products</h1>
            <livewire:products.product-selector :products="$products"/>
        </div> --}}
    </div>
</x-layout>
