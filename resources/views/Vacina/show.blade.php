@extends('shared.base')
@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Detalhes da Vacina</div>
        <div class="panel-body">  
            <div class="row">
                <div class="col-md-12">
                    <h4>Sobre a Vacina</h4>
                    <p><b>Código</b>:    {{$vacina->codigo}}</p>
                    <p><b>Descrição</b>: {{$vacina->desvac}}</p>
                    <p><b>Validade</b>:  {{$data1 = date("d/m/Y", strtotime($vacina->data))}}</p>
                    <p><b>Dose</b>:      {{$vacina->dose}}</p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
@endsection