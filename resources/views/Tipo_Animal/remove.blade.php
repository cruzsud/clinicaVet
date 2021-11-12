@extends('shared.base')
@section('content')
@if(Session::has('mensagem'))
  <div class="row">
    <div class="col-md-12">
     <div class="alert alert-warning">
        <div align="center">
         {{ Session::get('mensagem')['msg'] }}
        </div>
      </div>
   </div>
</div>        
@endif
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Detalhes da Espécie</div>
        <div class="panel-body">
        <form method="post" action="{{route ('tipo_animal.destroy', $tipo_animal->id_tipo)}}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE"> 
            <div class="row">
                <div class="col-md-12">
                    <h4>Sobre a Espécie</h4>
                    <p><b>Espécie</b>: {{$tipo_animal->dstip}}</p>
                    <p><b>Porte</b>:   {{$tipo_animal->porte}}</p>
                    <p><b>Raça</b>:    {{$tipo_animal->raca}}</p>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Remover</button>
                <a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
        </div>
    </div>
    
@endsection