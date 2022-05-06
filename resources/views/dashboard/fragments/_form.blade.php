{{-- Generar tóken para evitar ataques csfr --}}
@csrf
<label for="title">Titulo</label>
<input type="text" name="title" class="form-control" value="{{old('title', $post->title)}}">

<label for="title">Slug</label>
<input type="text" name="slug" class="form-control" value="{{old('slug', $post->slug)}}">

<label for="">Categoria</label>
<select name="category_id" class="form-control">
    <option value=""></option>
    {{-- Listamos las categorias --}}
    @foreach ($categories as $title => $id)
        <option {{old('category_id', $post->category_id) == $id ? 'selected' : ''}} value="{{ $id }}">{{ $title }}</option>
    @endforeach
</select>

<label for="">Estado posteado</label>
<select name="posted" class="form-control">
    <option {{old('posted', $post->posted) == "yes" ? "selected" : ""}} value="yes">Sí</option>
    <option {{old('posted', $post->posted) == "not" ? "selected" : ""}} value="not">No</option>
</select>

<label for="">Contenido</label>
<textarea name="content" cols="30" rows="10" class="form-control">{{old('content', $post->content)}}</textarea>

<label for="">Descripcion</label>
<textarea name="description" cols="30" rows="10" class="form-control">{{old('description', $post->description)}}</textarea>

@if (isset($task) && $task == 'edit')
    <label for="">Image</label>
    <input class="form-control" type="file" name="image">
@endif
{{-- Enviamos el formulario --}}
<button type="submit">Enviar</button>