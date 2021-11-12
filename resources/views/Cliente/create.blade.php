@extends('shared.base')
 
@section('content')
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
    <div class="panel panel-default">
 
        <div class="panel-heading"><h3>Cadastre o Cliente</h3></div>
        <div class="panel-body">
 
    <form method="post" action="{{route ('cliente.store')}}">
        {{ csrf_field() }}
        <h4>Dados do Cliente</h4>
        <hr>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" placeholder="Nome" name="nome" required>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control cpf-mask" placeholder="Ex.: 00000000000" name="cpf" maxlength="11" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" placeholder="Ex: Rua ...." required name="endereco">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" placeholder="Ex: Meier" required name="bairro">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" placeholder="Ex: 22012201" maxlength="8" required name="telefone">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" placeholder="Ex: 984002017" maxlength="9" required name="celular">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sexo">Sexo:</label><br>
                    <fieldset>
                        <label for="m"><input type="radio" name="sexo" id="M" value="M" class="radio"/> Masculino</label>
                        <label for="f"><input type="radio" name="sexo" id="F" value="F" class="radio"/> Feminino</label>
                </fieldset>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <label for="email">E-MAIL</label>
                    <input type="text" class="form-control" placeholder="Ex: joao@gmail.com" required name="email">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="nascimento">Nascimento</label>
                    <input type="date" class="form-control" placeholder="Ex: dd-mm-aaaa" required name="nascimento">
                </div>
            </div>
        </div>
            <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
        </div>
    </div>
 
@endsection