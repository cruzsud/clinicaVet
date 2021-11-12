@extends('shared.base')
@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Detalhes do Cliente</div>
        <div class="panel-body">  
            <div class="row">
                <div class="col-md-12">
                    <h4>Sobre o Cliente</h4>
                    <p><b>Nome</b>:       {{$cliente->Nome}}</p>
                    <p><b>CPF</b>:        {{$cliente->cpf}}</p>
                    <p><b>Nascimento</b>: {{$cliente->nascimento}}</p>
                    <p><b>Celular</b>:    {{$cliente->Celular}}</p>
                    <p><b>E-mail</b>:     {{$cliente->email}}</p>
                    <hr>
                    <h4>Endereço</h4>
                    <p><b>Logradouro</b>: {{$cliente->Endereco}}</p>
                    <p><b>Bairro</b>:     {{$cliente->Bairro}}</p>
                    <p><b>Telefone</b>:   {{$cliente->telefone}}</p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
@endsection