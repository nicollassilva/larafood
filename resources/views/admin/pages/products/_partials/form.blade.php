@include('admin.includes.alerts')
<div class="form-group">
    <label for="name">Título: </label>
    <input id="name" placeholder="Título do produto" name="title" class="form-control" type="text" value="{{ $product->title ?? old('title') }}">
</div>
<div class="form-group">
    <label for="price">Preço: </label>
    <input id="price" placeholder="Preço do produto" name="price" class="form-control" type="number" value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <label for="image">Imagem: </label>
    <input id="image" placeholder="Imagem do produto" name="image" class="form-control" type="file" accept="image/*">
</div>
<div class="form-group">
    <label for="description">* Descrição: </label>
    <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $product->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button class="btn btn-success" type="submit">Enviar</button>
</div>