<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/');
        // return Inertia::render('Welcome');
        // $posts = Post::with('category')->get();
        // return Inertia::render('Home', compact('posts'));
    }
}
