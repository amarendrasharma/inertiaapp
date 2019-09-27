<?php

namespace App\Http\Controllers;

use App\{Post, Category};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;


class FrontController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with(['category', 'user'])->first();
        return Inertia::render('Post/Show', compact('post'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
