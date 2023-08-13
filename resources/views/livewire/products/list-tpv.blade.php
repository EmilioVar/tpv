<table class="min-h-[2.75rem] w-full h-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs sticky top-0 text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
        </tr>
    </thead>
    <tbody>
        @foreach ($productsTpv as $productTpv)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $productTpv->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $productTpv->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $productTpv->price }}
                </td>
                <td class="px-6 py-4">
                    {{ $productTpv->pivot->quantity }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
