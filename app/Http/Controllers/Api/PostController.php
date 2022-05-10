<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class PostController extends Controller
{
    
    public function index()
    {
        return response()->json(Post::paginate(3));
    }

    public function store(StoreRequest $request)
    {
        return response()->json(Post::create($request->validated()));
    }

    public function show(Post $post)
    {
        return response()->json($post, 200);
    }

    public function update(PutRequest $request, Post $post)
    {
        $post->update($request->validated());
        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json('ok');
    }

    /* Own functions */
    public function all()
    {
        return response()->json(Post::get());
    }

    public function slug($slug)
    {
        $post = Post::with('category')->where('slug', $slug)->firstOrFail();
        return response()->json($post);
    }
}
