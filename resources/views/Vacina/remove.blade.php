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
        <div class="panel-heading">Detalhes da Vacina</div>
        <div class="panel-body">
        <form method="post" action="{{route ('vacina.destroy', $vacina->id_vacina)}}">
            <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}  
            <div class="row">
                <div class="col-md-12">
                    <h4>Sobre a Vacina</h4>
                    <p><b>Código</b>:    {{$vacina->codigo}}</p>
                    <p><b>Descrição</b>: {{$vacina->desvac}}</p>
                    <p><b>Validade</b>:  {{$data1 = date("d/m/Y", strtotime($vacina->data))}}</p>
                    <p><b>Dose</b>:      {{$vacina->dose}}</p>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Remover</button>
                <a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
        </form>
        </div>
    </div>

@endsection