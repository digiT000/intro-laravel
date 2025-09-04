<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $posts2 = Blogpost::with('category')->latest()->get();

        return view('home',[
            'posts'=>$posts2,
        ]);

    }
}
