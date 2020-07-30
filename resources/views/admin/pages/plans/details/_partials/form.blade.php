@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="text">Nome: </label>
    <input id="text" placeholder="Nome do detalhe" name="name" class="form-control" type="text" value="{{ $detail->name ?? old('name') }}">
</div>
<div class="form-group">
    <button class="btn btn-success" type="submit">Enviar</button>
</div>