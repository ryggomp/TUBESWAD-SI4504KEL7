<footer class="footer p-10 bg-[#52B788] text-white">
    <nav>
        <header class="font-bold text-lg">Services</header>
        <a class="link link-hover">Branding</a>
        <a class="link link-hover">Design</a>
        <a class="link link-hover">Marketing</a>
        <a class="link link-hover">Advertisement</a>
    </nav>
    <nav>
        <header class="font-bold text-lg">Company</header>
        <a class="link link-hover">About us</a>
        <a class="link link-hover">Contact</a>
        <a class="link link-hover">Jobs</a>
        <a class="link link-hover">Press kit</a>
    </nav>
    @role(['user'])
    <nav class="w-full">
        <header class="font-bold text-lg">Feedback</header>
        <form action="{{ route('feedback') }}" method="post" class="w-full">
            @csrf
            <textarea name="feedback" class="textarea textarea-bordered bg-white w-full text-black" placeholder="Feedback" rows="4"></textarea>
            <div class="flex justify-end">
                <button class="btn mt-2 bg-[#1B4332] text-white">Submit</button>
            </div>
        </form>
    </nav>
    @elserole('vendor')
    <nav class="w-full">
        <header class="font-bold text-lg">Feedback</header>
        <form action="{{ route('feedback') }}" method="post" class="w-full">
            @csrf
            <textarea name="feedback" class="textarea textarea-bordered bg-white w-full text-black" placeholder="Feedback" rows="4"></textarea>
            <div class="flex justify-end">
                <button class="btn mt-2 bg-[#1B4332] text-white">Submit</button>
            </div>
        </form>
    </nav>
    @endrole
</footer>
