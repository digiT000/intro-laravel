<x-layouts.main title="Home" description="A space for curious minds to learn, explore, and grow. From lifestyle hacks to deep-dive articles, we deliver fresh perspectives to keep you inspired every day.">
    <section class="min-h-3/5 w-full bg-orange-50 pt-4 pb-14">
        <x-navigation-bar/>
        <div class="flex flex-col gap-5 max-w-5xl mx-auto px-4 mt-5">
            <h1 class="text-4xl font-semibold text-neutral-900">Ideas Worth Sharing</h1>
            <p class="text-neutral-700 leading-[165%] max-w-xl">A space for curious minds to learn, explore, and grow. From lifestyle hacks to deep-dive articles, we deliver fresh perspectives to keep you inspired every day.</p>
        </div>
    </section>
    <section class="py-10">
        <div class="grid grid-cols-2 gap-5 max-w-5xl mx-auto px-4">
            @foreach ($posts as $post )
                <div class="cursor-pointer flex flex-col gap-2 p-3 hover:bg-neutral-50 hover:translate-y-2 hover:shadow-[1px_-14px_0px_-6px_rgba(0,0,0,0.75)] transition-all rounded-lg">
                    <p class="text-xs text-neutral-500">{{$post->category->name}}</p>
                    <h3 class="text-lg font-semibold text-neutral-950">{{$post->title}}</h3>
                    <p class="line-clamp-2 text-sm text-neutral-700 leading-[165%]">{{$post->description}}</p>
                </div>
            @endforeach
        </div>
        
      
    </section>
</x-layouts.main>


