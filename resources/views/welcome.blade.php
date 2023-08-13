<x-layout>
    <div id="pos-system" class="container-full grid grid-cols-6">
        <!-- items count -->
        <div id="items-screen" class="bg-red-400 h-[calc(50vh-2.75rem)] overflow-y-scroll col-span-4">
            <livewire:products.list-tpv :productsTpv="$productsTpv" />
        </div>
        <!-- keyboard -->
        <div id="keyboard" class="bg-blue-400 h-[calc(50vh-2.75rem)] col-span-2">
            <h1 class="">keyboard</h1>
        </div>
        <!-- groups -->
        <div id="groups" class="bg-green-400 h-[50vh] col-span-3">
            <h1 class="">groups</h1>
            <livewire:groups.group-selector :groups="$groups" />
        </div>
        <!-- products -->
        <div id="products" class="bg-orange-400 h-[50vh] col-span-3">
            <h1 class="">products</h1>
            <livewire:products.product-selector :products="$products" />
        </div>
    </div>
    <script type="module">
        Livewire.on('productSelect', function() {
            console.log("si")
            const productListContainer = document.getElementById('items-screen');
            const lastProduct = productListContainer.lastElementChild;
            lastProduct.scrollIntoView({
                behavior: 'smooth',
                block: 'end'
            });
        });
    </script>
</x-layout>
