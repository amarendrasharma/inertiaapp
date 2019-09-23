<?php

namespace App\Http\Controllers;

use App\{Post, Category};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PostController extends Controller
{

    public function index()
    {

        if (auth()->user()->isUser()) {
            $posts = Post::where('user_id', auth()->user()->id)->with(['category', 'user'])->simplePaginate(2);
            return Inertia::render('Post/Index', compact('posts'));
        }

        $posts = Post::with(['category', 'user'])->simplePaginate(3);

        return Inertia::render('Post/Index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::select('category_name', 'id')->get();
        $categories =  $categories->map(function ($category) {
            return [
                'label' => $category->category_name,
                'value' => $category->id
            ];
        });
        return Inertia::render('Post/Create', compact('categories'));
    }


    public function store(Request $request)
    {
        // marie09@example.com ->admin
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'image' => ['required', 'image'],
            'category_id' => ['required'],
            'publish_at' => ['required', 'date']
        ]);
        if ($request->file('image')) {
            $file_name = $request->file('image')->store('post');
        } else {
            $file_name = null;
        }
        Post::create(
            [
                'uuid' => Str::uuid(),
                'user_id' => auth()->user()->id,
                'publish_at' => $request->publish_at,
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category_id,
                'image' => $file_name,
                'description' => $request->description,
                'publish_at' => $request->publish_at
            ]
        );
        session()->flash('success', 'Post is stored successfully');
        return redirect('/posts');
    }


    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        $post->load('category');
        $categories = Category::select('category_name', 'id')->get();
        $categories =  $categories->map(function ($category) {
            return [
                'label' => $category->category_name,
                'value' => $category->id
            ];
        });
        return Inertia::render('Post/Edit', compact('post', 'categories'));
    }


    public function update(Request $request, Post $post)
    {
        // dd($request);
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'image' => ['nullable', 'image'],
            'category_id' => ['required']
        ]);
        if ($request->file('image')) {
            $file_name = $request->file('image')->store('post');
            $post->image = $file_name;
            $post->save();
        }
        $input = $request->except(['image']);
        $post->fill($input);
        $post->save();
        session()->flash('success', 'Post Updated');
        return redirect('/posts');
    }

    public function imageDelete(Post $post)
    {
        $post->image = null;
        $post->save();
        session()->flash('success', 'Image Deleted');
        return back();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('success', 'Post Deleted');
        return redirect()->back();
    }
}
