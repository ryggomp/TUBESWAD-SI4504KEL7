<x-app-layout>
    <div class="py-12 px-6">
        <h1 class="text-xl font-bold text-gray-700">List Vendor</h1>

        <div class="relative overflow-x-auto mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Vendor Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Vendor Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Vendor Photo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Join Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vendor as $data)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $data->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->email }}
                        </td>
                        <td class="px-6 py-4">
                            <label for="fotoVideoModal{{ $data->id }}" class="cursor-pointer">
                                <img src="{{ asset('storage/vendorPhoto/'. $data->foto) }}" alt="Foto/Video"
                                    class="w-24">
                            </label>
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->joinDate }}
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
