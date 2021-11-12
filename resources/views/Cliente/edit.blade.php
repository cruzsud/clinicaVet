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
        <div class="panel-heading"><h3>Edite o Cliente</h3></div>
        <div class="panel-body">
            <form method="post" action="{{route('cliente.update', $cliente->id_cliente)}}">  
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}          
                <h4>Dados do Cliente</h4>
                <hr>
                <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" placeholder="Nome" name="nome" value ="{{$cliente->Nome}}" required>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control cpf-mask" placeholder="Ex.: 000.000.000-00" name="cpf" maxlength="14" value ="{{$cliente->cpf}}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" placeholder="Ex: Rua ...." name="endereco" value ="{{$cliente->Endereco}}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" placeholder="Ex: Bairro" name="bairro" value ="{{$cliente->Bairro}}" required >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" placeholder="xxxxxxxxxx" maxlength="10" value ="{{$cliente->telefone}}"required name="telefone">
                </div>
            </div>
        </div>
        
        <div class="form-group">
                <label for="celular">Celular</label>
                <input type="text" class="form-control" placeholder="Ex: xxxxxxxxxxx" maxlength="11" value ="{{$cliente->Celular}}" required name="celular">
            </div>
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <label for="email">E-MAIL</label>
                    <input type="text" class="form-control" placeholder="Ex: joao@gmail.com" value ="{{$cliente->email}}" required name="email">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="nascimento">Nascimento</label>
                    <input type="date" class="form-control" placeholder="Ex: dd-mm-aaaa" value ="{{$cliente->nascimento}}" required name="nascimento">
                </div>
            </div>
        </div>
                <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</div>
 
@endsection