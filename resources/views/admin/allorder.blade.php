<x-app-layout>
    <div class="py-12 px-6">
        <h1 class="text-xl font-bold text-gray-700">All Order</h1>

        <div class="relative overflow-x-auto mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Pelanggan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Barang
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
                    @foreach($order as $key => $data)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $key+1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->users->name }}
                        </td>
                        <td class="px-6 py-4">
                        {{ $data->stores->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->quantity }} pcs
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->totalPrice }} points
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->date }}
                        </td>
                    </tr>
                    <!-- Foto/Video Modal -->
                    <input type="checkbox" id="fotoVideoModal{{ $data->id }}" class="modal-toggle" />
                    <div class="modal" role="dialog">
                        <div class="modal-box bg-white">

                            <img src="{{ asset('storage/vendorPhoto/'. $data->foto) }}" alt="Foto/Video">

                        </div>
                        <label class="modal-backdrop" for="fotoVideoModal{{ $data->id }}">Close</label>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
