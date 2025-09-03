<a href="{{url('post',['postId'=>$postId])}}" class="flex justify-between items-center gap-10 p-4 border border-neutral-100 rounded-xl bg-neutral-50 hover:shadow-lg transition-all">
    <div class="flex flex-col gap-2">
        <h3 class="text-base font-bold text-neutral-950">{{$title}}</h3>
        <p class="text-sm text-neutral-700 line-clamp-2 leading-[150%w]">{{$description}}</p>
    </div>
    
    <form action="{{route('post.deletePost',$postId)}}" method="post">
        @csrf
        @method('DELETE')
        <button  class="cursor-pointer px-4 py-1 border border-red-500 text-red-500 w-fit text-sm rounded-lg hover:bg-red-50 transition-all">Delete</button>
    </form>
</a>
