<div>
    {{$slot}}
    @foreach ($posts as $p)
        <div class="card mb-2">
            <h3>{{$p->title}}</h3>
            <a href="{{route('web.blog.show', $p)}}">Ir</a>
            <p>{{$p->description}}</p>
        </div>
    @endforeach

    {{$posts->links()}}
</div>