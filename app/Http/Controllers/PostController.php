<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index(){
        if(!isset(Auth::user()->id)){
            return view(view: 'welcome');
        }

        $userId = Auth::user()->id;
        
        $userPosts = Blogpost::where('user_id',$userId)->latest()->get();
        return view('welcome',[
                'posts'=>$userPosts
            ]);

    }

    public function show($postId = null){

        $userId = Auth::user()->id;
        $post = Blogpost::findOrFail($postId);

        if($post->user_id !== $userId){
            abort('404','Unauthorized Action');
        }
         
        return view('detailPost',[
            'post'=>$post
        ]);

        
    }

    public function createPost(Request $request){
        $incomingField = $request->validate([
            'title'=>['required','min:5'],
            "description"=>['required','max:200'],
            "content"=>['required','max:7000']
        ]);

        $data = [
            'title'=>$incomingField['title'],
            'description'=>$incomingField['description'],
            'content'=>$incomingField['content'],
            'user_id'=>Auth::user()->id
        ];

        Blogpost::create($data);

        return redirect('/');
    }

    public function deletePost(Request $request,string $us){
        $userId = Auth::user()->id;

        $post = Blogpost::find($us);
        if($post->user_id == $userId){
            $post->delete();
            return redirect('/');
        }else{
            return redirect('/');
        }
    }

    public function detailPost(Request $request, string $postId){}
}
