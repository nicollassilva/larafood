@include('admin.includes.alerts')
<div class="form-group">
    <label for="text">Nome: </label>
    <input id="text" placeholder="Nome do plano" name="name" class="form-control" type="text" value="{{ $plan->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="text">Preço: </label>
    <input id="text" placeholder="Preço do plano" name="price" class="form-control" type="text" value="{{ $plan->price ?? old('price') }}">
</div>
<div class="form-group">
    <label for="text">Descrição: </label>
    <input id="text" placeholder="Descrição do plano" name="description" class="form-control" type="text" value="{{ $plan->description ?? old('description') }}">
</div>
<div class="form-group">
    <button class="btn btn-success" type="submit">Enviar</button>
</div>