<x-app-layout>
    <div class="py-12 px-6">
        <div class="lg:flex gap-x-5">

            <img class="lg:w-1/2" src="{{ asset('assets/recyclefromhome.jpg') }}" alt="Recycle From Home">
            <div class="lg:w-1/2 lg:flex flex-col lg:justify-center">
                <h1 class="text-center font-bold text-xl text-[#1B4332] my-5">Daftar Pengirim Sampah</h1>
                <p class="text-black text-center">
                    Selamat datang di halaman 'Daftar Pengirim Sampah' kami! Halaman ini memberikan insight kepada kami,
                    sebagai vendor layanan daur ulang, mengenai mitra-mitra berharga kami yang telah berkontribusi dalam
                    menjaga lingkungan dengan mengirimkan sampah untuk didaur ulang. Di sini, kami dapat melacak dan
                    menghargai upaya-upaya positif mereka dalam mendukung keberlanjutan lingkungan
                </p>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Jenis Recycle</th>
                        <th scope="col" class="px-6 py-3">Jenis Sampah</th>
                        <th scope="col" class="px-6 py-3">Berat</th>
                        <th scope="col" class="px-6 py-3">Foto/Video</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($data) > 0)
                    <!-- row 1 -->
                    @foreach($data as $key => $value)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $key+1 }}</th>
                        <td class="px-6 py-4">{{ $value->nama }}</td>
                        <td class="px-6 py-4">{{ $value->jenisRecycle }}</td>
                        <td class="px-6 py-4">{{ $value->jenisSampah }}</td>
                        <td class="px-6 py-4">{{ $value->berat }} Kg</td>
                        <td class="px-6 py-4">
                            <label for="fotoVideoModal{{ $value->id }}" class="">
                                @if (pathinfo($value->file, PATHINFO_EXTENSION) == 'mp4')
                                    <video controls width="96">
                                    <source src="{{ asset('storage/buktiRecycle/'. $value->file) }}" type="video/webm" />
                                    <source src="{{ asset('storage/buktiRecycle/'. $value->file) }}" type="video/mp4" />
                                    </video>
                                @else
                                    <img src="{{ asset('storage/buktiRecycle/'. $value->file) }}" alt="Foto/Video"
                                        class="w-24">
                                @endif
                            </label>
                        </td>
                        <td class="px-6 py-4">
                            @if($value->status == "Processing")
                            <label for="approvalModal{{ $value->id }}"
                                class="btn bg-orange-500 text-white border-0">{{ $value->status }}</label>
                            @else
                            <p class="text-green-500 font-semibold">{{ $value->status }}</p>
                            @endif
                        </td>
                    </tr>
                    <!-- Foto/Video Modal -->
                    <input type="checkbox" id="fotoVideoModal{{ $value->id }}" class="modal-toggle" />
                    <div class="modal" role="dialog">
                        <div class="modal-box bg-white"> 
                            @if (pathinfo($value->file, PATHINFO_EXTENSION) == 'mp4')
                                <video controls>
                                <source src="{{ asset('storage/buktiRecycle/'. $value->file) }}" type="video/webm" />
                                <source src="{{ asset('storage/buktiRecycle/'. $value->file) }}" type="video/mp4" />
                                </video>
                            @else
                                <img src="{{ asset('storage/buktiRecycle/'. $value->file) }}" alt="Foto/Video">
                            @endif
                        </div>
                        <label class="modal-backdrop" for="fotoVideoModal{{ $value->id }}">Close</label>
                    </div>

                    <!-- Approval Modal -->
                    <input type="checkbox" id="approvalModal{{ $value->id }}" class="modal-toggle" />
                    <div class="modal" role="dialog">
                        <div class="modal-box bg-white">
                            <h3 class="font-bold text-lg text-center text-black">Approval</h3>
                            <form action="{{ route('vendor.approvalPengiriman', $value->id) }}" method="post">
                                @csrf
                                <div class="modal-action flex justify-center items-center gap-x-5 mt-5">
                                    <label for="approvalModal{{ $value->id }}"
                                        class="btn btn-error text-white">Decline</label>
                                    <button class="btn btn-success text-white">Approve</button>
                                </div>
                            </form>
                        </div>
                        <label class="modal-backdrop" for="approvalModal{{ $value->id }}">Decline</label>
                    </div>
                    @endforeach
                    @else
                    <tr>
                        <th class="text-center" colspan="5">
                            You've never used recycle from home.
                        </th>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
