@extends('shared.base')
@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Detalhes da Espécie</div>
        <div class="panel-body">  
            <div class="row">
                <div class="col-md-12">
                    <h4>Sobre a Espécie</h4>
                    <p><b>Espécie</b>: {{$tipo_animal->dstip}}</p>
                    <p><b>Porte</b>:   {{$tipo_animal->porte}}</p>
                    <p><b>Raça</b>:    {{$tipo_animal->raca}}</p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
@endsection