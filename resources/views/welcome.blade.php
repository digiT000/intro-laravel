<x-layouts.main title="Dashboard" description="Your Dashboard">
    @auth
    <section class="max-w-7xl mx-auto px-4">
        <header class="flex justify-between items-center py-5">
            <h1 class="text-base font-bold">Welcome Back, {{Auth::user()->name}}</h1>
            <form action="/logout" method="post">
            @csrf
            <button class="px-4 py-2 bg-neutral-200 text-neutral-900 font-medium w-fit rounded-2xl">Logout</button>
            </form>
        </header>
        <section class="flex gap-10">
            <form action="/create-post" method="post" class="flex flex-col gap-5 w-1/3">
            @csrf
            <div class="flex flex-col gap-2">
                <label>Title</label>
                <input name='title' class="p-2 border border-neutral-200 rounded-xl" type="text" placeholder="Enter title of the blog" />
            </div>
            <div class="flex flex-col gap-2">
                <label>Description</label>
                <input name='description' class="p-2 border border-neutral-200 rounded-xl" type="text" placeholder="Enter short description about your blog" />
            </div>
            <div class="flex flex-col gap-2">
                <label>Content</label>
                <textarea name='content' class="p-2 border border-neutral-200 rounded-xl resize-y min-h-24" type="text" placeholder="Enter your content here..." ></textarea>
            </div>
            <div class="flex flex-col gap-2">
                <label>Select Category</label>
                <select name='category' class="p-2 border border-neutral-200 rounded-xl">
                    @foreach ($categories as $category )
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <button class="px-4 py-2 bg-orange-600 text-white font-medium w-fit rounded-2xl">Create Blog</button>
            </form>
            
            <section class="w-2/3">
                <h2 class="text-xl font-bold mb-5">List Blog</h2>
                @if (count($posts) > 0)
                <section class="flex flex-col gap-4">
                    @foreach ($posts as $post )
                        <x-post-item :title="$post->title" :description="$post->description" :postId="$post->id"/>
                    @endforeach
                </section>
                @else
                    <p>Empty List</p>
                @endif    
            </section>
        </section>
    </section>
    @endauth       

</x-layouts.main>




