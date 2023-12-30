<style>
    ::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }

</style>
<x-app-layout>
    <div class="py-12 px-6">
        <div class="lg:flex lg:items-center gap-x-5">

            <img class="lg:w-1/2 rounded-md" src="{{ asset('assets/recyclefromhome.jpg') }}" alt="Recycle From Home">
            <div class="p-5 mt-5 rounded-md" style="background-image: url('{{ asset('assets/formWallpaper.avif') }}')">
                <div
                    class="bg-white rounded-md overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 lg:flex lg:flex-col lg:justify-center">
                    <h1 class="uppercase text-center font-bold text-xl text-[#1B4332] my-5">Recycle From Home</h1>
                    <p class="text-black text-center">
                        Selamat datang di halaman pengiriman bukti recycling dari rumah! Kami sangat menghargai
                        kontribusi
                        Anda dalam menjaga lingkungan dengan melakukan recycling di rumah. Silakan isi formulir di bawah
                        ini
                        dan unggahfoto
                        sebagai bukti bahwa Anda telah melakukan recycling di depan rumah Anda. Dengan berbagi tindakan
                        positif Anda, Anda juga dapat menginspirasi orang lain untuk bergabung dalam upaya untuk menjaga
                        bumi kita.
                    </p>
                </div>
            </div>
        </div>
        <div class="p-5 mt-5 rounded-xl" style="background-image: url('{{ asset('assets/formWallpaper.avif') }}')">

            <form action="{{ route('user.recycleFromHomeStore') }}" method="post" enctype="multipart/form-data"
                class="bg-[#52B788] p-4 rounded-lg mt-5 lg:w-1/2 lg:mx-auto">
                @csrf
                <h1 class="text-center text-gray-700 font-bold mb-4">Form Recycle From Home</h1>
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
                    <x-input-label for="vendor" :value="__('Vendor')" />
                    <select name="vendor" class="select select-bordered w-full bg-white text-black" required>
                        <option value="" selected>Choose your Vendor</option>
                        @foreach($vendor as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-2">
                    <x-input-label for="jenisSampah" :value="__('Jenis Recycle')" />
                    <select name="jenisSampah" class="select select-bordered w-full bg-white text-black" required>
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
                    <input type="number" name="berat" class="textarea textarea-bordered bg-white w-full text-black"
                        value="1" min="1" required>
                </div>
                <div class="mt-2">
                    <x-input-label for="date" :value="__('Tanggal')" />
                    <input type="date" name="tanggal" class="textarea textarea-bordered bg-white w-full" required>
                </div>
                <div class="mt-2">
                    <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                    <textarea name="deskripsi" class="textarea textarea-bordered bg-white w-full text-black"
                        placeholder="Deskripsi" required></textarea>
                </div>
                <div class="mt-2">
                    <x-input-label for="file" :value="__('Foto Bukti')" />
                    <input type="file" name="file" class="file-input file-input-bordered w-full bg-white text0-black" />
                </div>
                <div class="flex justify-center">
                    <button class="btn bg-[#1B4332] w-full max-w-xs text-white mx-auto mt-5"
                        type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
