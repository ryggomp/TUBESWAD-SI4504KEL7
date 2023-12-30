<x-app-layout>
    <div class="py-12 px-6">
        <h1 class="text-xl font-bold text-gray-700">My Order</h1>

        <div class="relative overflow-x-auto mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($myorder as $data)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $data->stores->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->quantity }} pcs
                        </td>
                        <td class="px-6 py-4">
                            {{ number_format($data->price, 0, ',', '.') }} Points
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->test }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
