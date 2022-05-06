@extends('dashboard.layout')

@section('content')
    <h1>{{$post->title}}</h1>
    {{-- Llamamos la vista de errores --}}
    @include('dashboard.fragments._errors-form')

    <p>{{$post->description}}</p>
    <p>{{$post->posted}}</p>
    <div>{{$post->content}}</div>
@endsection