@extends('dashboard.layout')

@section('content')

    

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{route('post.create')}}">Crear post</a>
            </li>
          </ul>
        </div>
      </nav>

    <table border="1" class="table container border">
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
                            <a class="m-1 btn btn-primary" href="{{route('post.edit', $p->id)}}">Editar</a>
                            <a class="m-1 btn btn-success" href="{{route('post.show', $p->id)}}">Ver</a>
                            <form action="{{route('post.destroy', $p->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="m-1 btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tr>
        </tbody>
    </table>

    <div class="container row">
        <div class="col-sm-4">
            {{-- Creamos la paginación de los elementos listados --}}
            {{$posts->links()}}
        </div>
    </div>
@endsection