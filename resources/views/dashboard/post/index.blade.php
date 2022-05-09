@extends('dashboard.layout')

@section('content')

@section('header')
<a class="btn btn-success" href="{{route('post.create')}}">Crear post</a>
@endsection

    <table class="table mb-3">
        <thead>
            <tr>
                <td>Titulo</td>
                <td>Categoria</td>
                <td>Posted</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                {{-- Obtener los resultados de los posts hechos --}}
                @foreach ($posts as $p)
                    <tr>
                        <th>{{$p->title}}</th>
                        <th>{{$p->category->title}}</th>
                        <th>{{$p->posted}}</th>
                        <th>
                            {{-- Agregamos enlaces para editar, ver o eliminar el post --}}
                            <a class="btn btn-info" href="{{route('post.edit', $p->id)}}">Editar</a>
                            <a class="btn btn-primary" href="{{route('post.show', $p->id)}}">Ver</a>
                            <form action="{{route('post.destroy', $p->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tr>
        </tbody>
    </table>

    {{-- Creamos la paginación de los elementos listados --}}
    {{$posts->links()}}
@endsection