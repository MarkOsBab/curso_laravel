@extends('dashboard.layout')

@section('content')
    <h1>Editar post: {{$post->title}}</h1>
    {{-- Llamamos la vista de errores --}}
    @include('dashboard.post.fragments._errors-form')
    {{-- Crear la ruta del formulario y el metodo --}}
    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @method("PUT")
        @include('dashboard.post.fragments._form', ['task' => 'edit'])
        
    </form>
@endsection