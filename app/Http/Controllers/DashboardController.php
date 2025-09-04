<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\Category;



class DashboardController extends Controller
{
    public function index(){
        $posts = Blogpost::with(['category','user'])->latest()->take(10)->get();
        $categories = Category::orderBy('name')->get();

        return view('welcome',[
                'posts'=>$posts,
                'categories'=>$categories
            ]);
    }
}
