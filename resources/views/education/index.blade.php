<x-app-layout>
    <div class="relative">
        <h1 class="text-white absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-fit font-bold text-center">
            Landscaping With Recycled Materials</h1>
        <div class="w-full h-full bg-center bg-cover bg-no-repeat"
            style="background-image: url('/assets/education.jpg')">
            <img class="invisible" src="{{ asset('assets/education.jpg') }}" alt="">
        </div>
    </div>
    <section class="p-5 text-black">
        <h1 class="text-xl font-semibold">Education</h1>
        <div class="grid grid-cols-1 gap-2 md:gap-5 rounded-md md:grid-cols-2 lg:grid-cols-3 mt-3">
            <div class="card card-side bg-base-100 shadow-xl rounded-none">
                <figure class="w-1/2 bg-white bg-center bg-cover bg-no-repeat"
                    style="background-image: url('/assets/education1.jpg')">
                    <img class="invisible" src="{{ asset('assets/education1.jpg') }}" alt="Education Photo" />
                </figure>
                <div class="w-1/2 card-body relative bg-white">
                    <h2 class="font-semibold">Memilah Sampah</h2>
                    <div class="card-actions justify-end">
                        <a href="{{ route('user.education.education1') }}" class="btn bg-[#52B788] text-white border-0 lg:absolute bottom-6">Read!</a>
                    </div>
                </div>
            </div>
            <div class="card card-side bg-base-100 shadow-xl rounded-none">
                <figure class="w-1/2 bg-white bg-center bg-cover bg-no-repeat"
                    style="background-image: url('/assets/education2.jpeg')">
                    <img class="invisible" src="{{ asset('assets/education1.jpg') }}" alt="Education Photo" />
                </figure>
                <div class="w-1/2 card-body relative bg-white">
                    <h2 class="font-semibold">Advancements in Plastic Recycling Technology</h2>
                    <div class="card-actions justify-end">
                        <a href="{{ route('user.education.education2') }}" class="btn bg-[#52B788] text-white border-0 lg:absolute bottom-6">Read!</a>
                    </div>
                </div>
            </div>
            <div class="card card-side bg-base-100 shadow-xl rounded-none">
                <figure class="w-1/2 bg-white bg-center bg-cover bg-no-repeat"
                    style="background-image: url('/assets/education3.jpg')">
                    <img class="invisible" src="{{ asset('assets/education1.jpg') }}" alt="Education Photo" />
                </figure>
                <div class="w-1/2 card-body relative bg-white">
                    <h2 class="font-semibold">FDA Approval of Recycling Processes for Food Contact Packaging</h2>
                    <div class="card-actions justify-end">
                        <a href="{{ route('user.education.education3') }}" class="btn bg-[#52B788] text-white border-0 lg:absolute bottom-6">Read!</a>
                    </div>
                </div>
            </div>
            <div class="card card-side bg-base-100 shadow-xl rounded-none">
                <figure class="w-1/2 bg-white bg-center bg-cover bg-no-repeat"
                    style="background-image: url('/assets/education4.jpg')">
                    <img class="invisible" src="{{ asset('assets/education1.jpg') }}" alt="Education Photo" />
                </figure>
                <div class="w-1/2 card-body relative bg-white">
                    <h2 class="font-semibold">Innovations at Coperion Recycling Innovation Center</h2>
                    <div class="card-actions justify-end">
                        <a href="{{ route('user.education.education4') }}" class="btn bg-[#52B788] text-white border-0 lg:absolute bottom-6">Read!</a>
                    </div>
                </div>
            </div>
            <div class="card card-side bg-base-100 shadow-xl rounded-none">
                <figure class="w-1/2 bg-white bg-center bg-cover bg-no-repeat"
                    style="background-image: url('/assets/education5.jpg')">
                    <img class="invisible" src="{{ asset('assets/education1.jpg') }}" alt="Education Photo" />
                </figure>
                <div class="w-1/2 card-body relative bg-white">
                    <h2 class="font-semibold">Cutting-Edge Research in Chemical Recycling</h2>
                    <div class="card-actions justify-end">
                        <a href="{{ route('user.education.education5') }}" class="btn bg-[#52B788] text-white border-0 lg:absolute bottom-6">Read!</a>
                    </div>
                </div>
            </div>
            <div class="card card-side bg-base-100 shadow-xl rounded-none">
                <figure class="w-1/2 bg-white bg-center bg-cover bg-no-repeat"
                    style="background-image: url('/assets/education6.jpg')">
                    <img class="invisible" src="{{ asset('assets/education1.jpg') }}" alt="Education Photo" />
                </figure>
                <div class="w-1/2 card-body relative bg-white">
                    <h2 class="font-semibold">Global Trends and Policies in Recycling</h2>
                    <div class="card-actions justify-end">
                        <a href="{{ route('user.education.education6') }}" class="btn bg-[#52B788] text-white border-0 lg:absolute bottom-6">Read!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
