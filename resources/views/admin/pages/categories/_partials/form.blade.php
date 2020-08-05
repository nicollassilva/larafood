@include('admin.includes.alerts')
<div class="form-group">
    <label for="name">Nome: </label>
    <input id="name" placeholder="Nome da categoria" name="name" class="form-control" type="text" value="{{ $category->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="description">Descrição: </label>
    <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $category->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button class="btn btn-success" type="submit">Enviar</button>
</div>