@extends('dashboard.layout')

@section('content')
    <h1>Crear post</h1>
    {{-- Llamamos la vista de errores --}}
    @include('dashboard.fragments._errors-form')
    {{-- Crear la ruta del formulario y el metodo --}}
    <form action="{{ route('post.store') }}" method="post">
        @include('dashboard.fragments._form')
    </form>
@endsection