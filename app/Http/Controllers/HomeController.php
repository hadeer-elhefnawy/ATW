<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        $canEdit = false;
        return view('homePage',compact('posts','canEdit'));
    }
    public function adminIndex()
    {
        $posts = Post::all();
        $canEdit = true;
        return view('homePage',compact('posts','canEdit'));
    }
}
