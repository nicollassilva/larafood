@include('admin.includes.alerts')
<div class="form-group">
    <label for="text">Nome: </label>
    <input id="text" placeholder="Nome do Perfil" name="name" class="form-control" type="text" value="{{ $permission->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="text">Descrição: </label>
    <input id="text" placeholder="Descrição do Perfil" name="description" class="form-control" type="text" value="{{ $permission->description ?? old('description') }}">
</div>
<div class="form-group">
    <button class="btn btn-success" type="submit">Enviar</button>
</div>