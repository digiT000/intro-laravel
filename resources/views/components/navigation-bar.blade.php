<header class="">
    <div class="max-w-5xl mx-auto flex justify-between items-center">
        <img class="h-5" src="{{asset('image/logo.svg')}}"/>
        @auth()
            <a class="text-sm px-4 py-2 bg-neutral-200 text-neutral-900 font-medium w-fit rounded-2xl" href="{{route('dashboard')}}">Go To Dashboard</a>
            @else
            <div class="flex gap-4 items-center">
                <a class="text-sm px-4 py-2 bg-neutral-200 text-neutral-900 font-medium w-fit rounded-2xl"  href="{{route('login')}}">Login As Writer</a>
                <a class="text-sm px-4 py-2 bg-neutral-900 text-white font-medium w-fit rounded-2xl" href="{{route('register')}}">Become A Writer</a>
            </div>
        @endauth
    </div>
</header>