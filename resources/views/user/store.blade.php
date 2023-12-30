<x-app-layout>
    <div class="mt-12 mx-10 bg-white shadow-lg rounded-lg p-5">
        <h1 class="text-xl font-bold text-gray-700">Your Point: {{ auth()->user()->point }}</h1>
    </div>
    <div class="py-12 px-5 min-h-screen grid grid-cols-1 lg:grid-cols-3 gap-5">
        @foreach($store as $data)
        <div class="card bg-white shadow-xl">
            <div class="bg-center bg-contain bg-no-repeat"
                style="background-image: url('{{ asset('assets/' . $data->photo ) }}')">
                <img src="{{ asset('assets/sendal.png') }}" alt="Shoes" class="invisible" />
            </div>
            <div class="card-body text-gray-700">
                <h2 class="card-title">{{ $data->name }}</h2>
                <p>{{ number_format($data->price, 0, ',', '.') }} Points</p>
                <div class="card-actions justify-end">
                    <label for="buyModal{{ $data->id }}" class="btn btn-primary">Buy Now</label>
                </div>
            </div>
        </div>

        <!-- Put this part before </body> tag -->
        <input type="checkbox" id="buyModal{{ $data->id }}" class="modal-toggle" />
        <div class="modal" role="dialog">
            <div class="modal-box bg-white text-gray-700">
                <div class="flex w-full items-center justify-between">
                    <h3 class="font-bold text-lg">Buy {{ $data->name }}</h3>
                    <p class="">{{ number_format($data->price, 0, ',', '.') }} Points/pcs</p>
                </div>
                <form action="{{route('user.storeBuy')}}" method="post">
                    @csrf
                    <div class="flex gap-x-2 mt-3 h-24">
                        <div class="w-1/3 bg-center bg-contain bg-no-repeat" style="background-image: url('{{ asset('assets/' . $data->photo ) }}')">
                        </div>
                        <div class="flex items-center gap-x-2">
                            <input type="hidden" name="barang_id" value="{{ $data->id }}">
                            <input type="number" name="quantity" placeholder="Type here" class="input input-bordered bg-white" min="1" value="1" />
                            <p>pcs</p>
                        </div>
                    </div>
                    <div class="modal-action">
                        <label for="buyModal{{ $data->id }}" class="btn">Close!</label>
                        <button class="btn btn-warning text-white">Checkout</button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
