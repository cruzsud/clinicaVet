@extends('shared.base')
@section('content')

<?php 

    $id   = $animal->id_animal; 
    $Animais = DB::table('tipo_animais')->select( 'animais.nome as nomeanimal', 'clientes.nome as nomecliente', 'animais.nascimento as nascimento', 'tipo_animais.dstip as tipo', 'animais.id_animal as id_animal', 'animais.cor as cor','clientes.endereco as end', 'clientes.telefone as tel')->join('animais', 'animais.id_tipo', '=', 'tipo_animais.id_tipo')->join('clientes', 'clientes.id_cliente', '=', 'animais.id_cliente')->where('animais.id_animal','=',$id)->orderBy('animais.Nome', 'ASC')->get();

?>

<div class="panel panel-default">
      <div class="panel-heading">Remover o Animal</div>
        <div class="panel-body">
            <form method="post" action="{{route ('animal.destroy', $animal->id_animal)}}">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <h4>Sobre o Animal</h4>
                        @foreach($Animais as $ani)
                        <p>Nome:        {{$ani->nomeanimal}}</p>
                        <p>Nascimento:  {{$data1 = date("d/m/Y", strtotime($ani->nascimento))}}</p>
                        <p>Especie:     {{$ani->tipo}}</p>
                        <p>Cor:         {{$ani->cor}}</p>
                        @endforeach
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <h4>Dono</h4>
                        @foreach($Animais as $cli)
                        <p>Nome:     {{$cli->nomecliente}}</p>
                        <p>Endereço: {{$cli->end}}</p>
                        <p>Telefone: {{$cli->tel}}</p>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-danger">Remover</button>
                <a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
            </form>
        </div>
    
    </div>
@endsection