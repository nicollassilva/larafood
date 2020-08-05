@include('admin.includes.alerts')
<div class="form-group">
    <label for="name">Nome: </label>
    <input id="name" placeholder="Nome do usuário" name="name" class="form-control" type="text" value="{{ $user->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="e-mail">E-mail: </label>
    <input id="e-mail" placeholder="E-mail" name="email" class="form-control" type="email" value="{{ $user->email ?? old('email') }}">
</div>
<div class="form-group">
    <label for="password">Senha: </label>
    <input id="password" placeholder="Senha" name="password" class="form-control" type="password">
</div>
<div class="form-group">
    <button class="btn btn-success" type="submit">Enviar</button>
</div>