@extends('dashboard.layout')

@section('content')
<h1>Index</h1>

@section('header')
<a class="btn btn-success" href="{{route('post.create')}}">Crear post</a>
@endsection

    <table class="table mb-3">
        <thead>
            <tr>
                <td>Titulo</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
            <tr>
                <th>{{$c->title}}</th>
                <th>
                    <a class="btn btn-primary m-1" href="{{route('category.edit', $c->id)}}">Editar</a>
                    <a class="btn btn-success m-1" href="{{route('category.show', $c->id)}}">Ver</a>
                    <form action="{{route('category.destroy', $c->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-1" type="submit">Eliminar</button>
                    </form>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Creamos la paginación de los elementos listados --}}
    {{$categories->links()}}
    
@endsection