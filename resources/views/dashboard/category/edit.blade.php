@extends('dashboard.layout')

@section('content')
    <h1>Crear una nueva categoría</h1>
    @include('dashboard.category.fragments._errors-form')

    <form class="container" action="{{ route('category.update', $category->id) }}" method="post">
        @method("PUT")
        @include('dashboard.category.fragments._form')
    </form>
@endsection