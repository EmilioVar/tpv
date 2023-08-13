<table class="min-h-[2.75rem] w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs sticky top-0 text-gray-700 uppercase border-b-4 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3">
                Nombre
            </th>
            <th scope="col" class="px-6 py-3">
                Precio
            </th>
            <th scope="col" class="px-6 py-3">
                Cantidad
            </th>
            <th scope="col" class="px-6 py-3">
                Acciones
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productsTpv as $productTpv)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $productTpv->id }}
                </th>
                <td class="px-6 py-4">
                    <input type="text" class="rounded-md" value="{{ $productTpv->name }}">
                </td>
                <td class="px-6 py-4">
                    <input class="w-1/3 rounded-md" step="0.5" type="number" value="{{ $productTpv->price }}">
                </td>
                <td class="px-6 py-4">
                    <input type="number" class="w-1/3 rounded-md" value="{{ $productTpv->pivot->quantity }}">

                </td>
                <td class="px-6 py-4 flex">
                    <button wire:click="productIncrement({{ $productTpv->id }})" class="border-2 flex items-center justify-center m-1 w-7 h-7 text-xl bg-green-200">+</button>
                    <button wire:click="productDecrement({{ $productTpv->id }})" class="border-2 flex items-center justify-center m-1 w-7 h-7 text-xl bg-red-200">-</button>
                    <button wire:click="productRemove({{ $productTpv->id }})" class="border-2 flex items-center justify-center m-1 w-7 h-7 text-xl bg-red-500">el</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
