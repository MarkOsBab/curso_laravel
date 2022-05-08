@extends('dashboard.layout')

@section('content')
    {{-- Llamamos la vista de errores --}}
    @include('dashboard.post.fragments._errors-form')
    <h2>Post's con la categoria {{$category->title}}</h2>
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Category ID</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($category->posts as $c)
            <tr>
                <th>
                    {{$c->id}}
                </th>
                <th>
                    {{$c->title}}
                </th>
                <th>
                    {{$category->id}}
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection