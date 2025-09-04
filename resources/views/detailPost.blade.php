<x-layouts.main :title="$post->title" :description="$post->description">
    <section class="max-w-4xl mx-auto px-10 py-10 bg-neutral-50 rounded-3xl mt-10">
        <div class="flex justify-between items-center gap-10">
            <a href="{{url()->previous('/dashboard')}}" class="text-sm inline-block mb-4 px-3 py-1 border border-neutral-200 rounded-lg text-neutral-700 w-fit">⬅️ Back</a>
            <div class="h-[1px] w-full border border-neutral-100"></div>
            <form action="{{route('post.deletePost',$post->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button  class="cursor-pointer px-4 py-1 border border-red-500 text-red-500 w-fit text-sm rounded-lg hover:bg-red-50 transition-all">Delete</button>
            </form>
        </div>
        <h1 class="text-5xl font-semibold text-neutral-950 mb-10 leading-[120%]">
            {{$post->title}}
        </h1>
        <section class="mb-4">
            <h2 class="text-lg font-semibold text-neutral-950 mb-4">
                Summary
            </h2>
            <p class="leading-[170%] text-neutral-700">
                {{$post->description}}
            <p>
        </section>
    <hr class="my-6"/>
        <p class="leading-[170%] text-neutral-700">
            {{$post->content}}
        </p>
        </section>
</x-layouts.main>