<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

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
            "content"=>['required','max:7000'],
            "category"=>['required']
        ]);

        $data = [
            'title'=>$incomingField['title'],
            'description'=>$incomingField['description'],
            'content'=>$incomingField['content'],
            'user_id'=>Auth::user()->id,
            'category_id'=>$incomingField['category']
        ];

        Blogpost::create($data);

        return redirect('/dashboard');
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
