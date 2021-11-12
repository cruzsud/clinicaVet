@extends('shared.base')
@section('content')



<?php 
    $id=$consulta->id_consulta;
    $AniCli = DB::table('consultas')->select('consultas.data as data', 'animais.nome as nomeanimal', 'clientes.nome as nomecliente', 'animais.nascimento as nascimento')->join('animais', 'animais.id_animal', '=', 'consultas.id_animal')->join('clientes', 'clientes.id_cliente', '=', 'animais.id_cliente')->where('consultas.id_consulta', '=', $id)->orderBy('animais.Nome', 'ASC')->get();

 ?>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Remover a Consulta</div>
        <div class="panel-body"> 
        <form method="post" action="{{route ('consulta.destroy', $consulta->id_consulta)}}">
            <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <h4>Informações do Animal</h4>

                        @foreach($AniCli as $cons)
                            <p><b>Nome</b>           : {{$cons->nomeanimal}}</p>
                            <p><b>Dono</b>           : {{$cons->nomecliente}}</p>
                            <p><b>Nascimento</b>     : {{$data2 = date("d/m/Y", strtotime($cons->nascimento))}}</p>
                        @endforeach

                        <hr>
                        <h4>Informações Sobre a Consulta</h4>

                            <p><b>Descrição</b>        : {{$consulta->dscon}}</p>
                            <p><b>Data da Consulta</b> : {{$data1 = date("d/m/Y", strtotime($consulta->data))}}</p>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger">Remover</button>
                <a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
        </form>
    </div>
</div>
  
@endsection