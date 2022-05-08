@csrf
<label for="">Nombre de la categoría</label>
<input class="form-control" name="title" type="text" value="{{old('title', $category->title)}}">
<label for="">Slug de la categoría</label>
<input class="form-control" name="slug" type="text" value="{{old('slug', $category->slug)}}">
<button type="submit" class="btn btn-primary mt-1">Envíar</button>