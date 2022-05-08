<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Variable que contiene la paginación y listado de los elementos en Post
        $posts = Post::paginate(3);
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title');
        $post = new Post();
        echo view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // $validated = $request->validate(StoreRequest::myRules());

        //$validated = Validator::make($request->all(), StoreRequest::myRules());
        
        //dd($validated->fails());
        //dd($validated->errors());

        //dd($request->validated()['slug']);

        // $data = $request->validated();

        // $data['slug'] = Str::slug($data['title']);

        // dd($data);

        Post::create($request->validated());
        return to_route('post.index')->with('status', 'Registro creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $posted = Post::find($post);
        return view('dashboard.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        echo view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        if (isset($data['image']) && $data['image']) {
            // Obtenemos el nombre de la imágen
            $data['image'] = $filename = time().".".$data['image']->extension();

            $request->image->move(public_path('images'), $filename);

        }
        $post->update($data);
        // Mostrar mensaje personalizado al enviar la actualización del registro
        //$data->session()->flash('status', 'Registro actualizado');
        return to_route('post.index')->with('status', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('post.index')->with('status', 'Registro eliminado');
    }
}
