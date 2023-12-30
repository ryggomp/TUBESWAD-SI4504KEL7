<x-app-layout>
    <div class="py-12 px-6">
        <div>

            <h1 class="font-bold text-xl text-center uppercase text-black mb-5">Nearest Recycle</h1>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31683.067415203834!2d107.6078908743164!3d-6.964014499999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9ee933ba4a7%3A0x497e81348ae71!2s%22Benalu%22%20Recycle%20world!5e0!3m2!1sen!2sid!4v1702484961313!5m2!1sen!2sid"
                width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" class="w-full"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="mt-5">
            <h1 class="font-bold text-xl text-black mb-5">List Nearest Vendor</h1>
            <div class="grid grid-cols-1 lg:grid-cols-3 mt-3 gap-5">
                @foreach($vendor as $data)
                <div class="card card-compact bg-base-100 shadow-xl">
                    <div class="bg-center bg-cover bg-no-repeat rounded-t-2xl"
                        style="background-image: url('{{ asset('storage/vendorPhoto/'. $data->foto ) }}')">
                        <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes"
                            class="invisible" />
                    </div>
                    <div class="card-body bg-white text-gray-700">
                        <h2 class="card-title">{{ $data->name }}</h2>
                        <p>If a dog chews shoes whose shoes does he choose?</p>
                        <div class="card-actions justify-end">
                            <label for="recycleModal{{ $data->id }}" class="btn btn-primary">Recycle Now!</label>
                        </div>
                    </div>
                </div>

                <input type="checkbox" id="recycleModal{{ $data->id }}" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box w-10/12 max-w-5xl bg-white text-gray-700">
                        <h3 class="font-bold text-lg text-center">Recycle Onsite in {{ $data->name }}</h3>
                        <form action="{{ route('user.nearestRecycleStore') }}" method="post" class="py-4" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="vendor" value="{{ $data->id }}">
                            <div>
                                <x-input-label for="name" :value="__('Nama')" />
                                <input type="text" placeholder="Nama" name="nama"
                                    class="input input-bordered w-full bg-white mt-1 text-black" required />
                            </div>
                            <div class="mt-2">
                                <x-input-label for="alamat" :value="__('Alamat')" />
                                <textarea name="alamat" class="textarea textarea-bordered bg-white w-full text-black"
                                    placeholder="Alamat" required></textarea>
                            </div>
                            <div class="mt-2">
                                <x-input-label for="jenisSampah" :value="__('Jenis Recycle')" />
                                <select name="jenisSampah" class="select select-bordered w-full bg-white text-black"
                                    required>
                                    <option value="" selected>Choose your recycle Type</option>
                                    <option class="Kertas">Kertas</option>
                                    <option class="Plastik">Plastik</option>
                                    <option class="Kaca">Kaca</option>
                                    <option class="Logam">Logam</option>
                                    <option class="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="mt-2">
                                <x-input-label for="berat" :value="__('Berat Sampah (dalam Kg)')" />
                                <input type="number" name="berat"
                                    class="textarea textarea-bordered bg-white w-full text-black" value="1" min="1"
                                    required>
                            </div>
                            <div class="mt-2">
                                <x-input-label for="date" :value="__('Tanggal')" />
                                <input type="date" name="tanggal" class="textarea textarea-bordered bg-white w-full"
                                    required>
                            </div>
                            <div class="mt-2">
                                <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                <textarea name="deskripsi" class="textarea textarea-bordered bg-white w-full text-black"
                                    placeholder="Deskripsi" required></textarea>
                            </div>
                            <div class="mt-2">
                                <x-input-label for="file" :value="__('Foto Bukti')" />
                                <input type="file" name="file"
                                    class="file-input file-input-bordered w-full bg-white text0-black" />
                            </div>
                            <div class="modal-action flex justify-between items-center">
                                <label for="recycleModal{{ $data->id }}" class="btn">Close!</label>
                                <button class="btn bg-[#1B4332] w-full max-w-xs text-white mx-auto mt-5"
                                    type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
