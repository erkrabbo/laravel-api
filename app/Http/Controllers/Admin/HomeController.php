<?php

namespace App\Http\Controllers\Admin;
use App\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()) {
            $posts = Post::paginate(20);
            return view('index', compact('posts'));
        }

        return view('guests.index');
    }
}
