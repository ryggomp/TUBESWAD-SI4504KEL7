<x-app-layout>
    <div class="py-12 px-6">
        <h1 class="text-xl font-bold text-gray-700">List Recycle</h1>

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
                            Nama Vendor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Recycle
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Sampah
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Berat Sampah
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Foto/Video
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listRecycle as $key => $data)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $key+1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->usernames->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->users->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->jenisRecycle }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->jenisSampah }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->berat }} Kg
                        </td>
                        <td class="px-6 py-4">
                            <label for="fotoVideoModal{{ $data->id }}" class="cursor-pointer">
                                <img src="{{ asset('storage/buktiRecycle/'. $data->file) }}" alt="Foto/Video"
                                    class="w-24">
                            </label>
                        </td>
                        <td class="px-6 py-4 font-medium">
                            @if($data->status == 'Processing')
                            <p class="text-orange-600">
                                {{ $data->status }}
                            </p>
                            @else
                            <p class="text-green-600">
                                {{ $data->status }}
                            </p>
                            @endif
                        </td>
                    </tr>
                    <!-- Foto/Video Modal -->
                    <input type="checkbox" id="fotoVideoModal{{ $data->id }}" class="modal-toggle" />
                    <div class="modal" role="dialog">
                        <div class="modal-box bg-white">

                            <img src="{{ asset('storage/buktiRecycle/'. $data->file) }}" alt="Foto/Video">

                        </div>
                        <label class="modal-backdrop" for="fotoVideoModal{{ $data->id }}">Close</label>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
