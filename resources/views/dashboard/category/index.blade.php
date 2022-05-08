@extends('dashboard.layout')

@section('content')
    <h1>Index</h1>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{route('category.create')}}">Crear post</a>
            </li>
          </ul>
        </div>
    </nav>

    <table class="table border">
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
    <div class="container row">
        <div class="col-sm-4">
            {{-- Creamos la paginación de los elementos listados --}}
            {{$categories->links()}}
        </div>
    </div>
    
@endsection