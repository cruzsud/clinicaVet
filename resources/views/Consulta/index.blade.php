@extends('shared.base')
@section('content')
    <div class="panel panel-default">    
        <div class="panel-heading">Lista de Consultas</div>
        <form method="GET" action="{{route('consulta.index','buscar')}}">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Digite o nome do Animal" name="buscar">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Pesquisar</button>
                    </span>
                </div>
            </div>
        </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th align="center">Animal</th>
                            <th align="center">Dono</th>
                            <th align="center">Data Da Consulta</th>
                            <th align="center">Ações</th>
                        </tr>
                    </thead>            
                    <tbody>
<?php
       //$AniCli = DB::table('consultas')->join('animais', 'animais.id_animal', '=', 'consultas.id_animal')->join('clientes', 'clientes.id_cliente', '=', 'animais.id_cliente')->select('consultas.data as data', 'animais.nome as nomeanimal', 'clientes.nome as nomecliente', 'consultas.id_consulta as id_consulta')->orderBy('animais.Nome', 'ASC')->get();
?>            
                        @foreach($consultas as $cons)
                            <tr>
                                <td>{{$cons->nome}}</td>
                                <td>{{$cons->Nome}}</td>
                                <td><?php echo $data1 = date("d/m/Y", strtotime($cons->data)) ?></td>
                                <td>
                                    <a href="{{route('consulta.edit', $cons->id_consulta)}}"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="{{route('consulta.remove', $cons->id_consulta)}}"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="{{route('consulta.show', $cons->id_consulta)}}"><i class="glyphicon glyphicon-zoom-in"></i></a>
                                </td>                                
                            </tr>                         
                        @endforeach                                
                    </tbody>
                </table> 
            </div> 
        </div>
		<div align="center" class="row">
		{{ $consultas->links() }}
		</div>
    </div>
    <a href="{{route('consulta.create')}}"><button class="btn btn-primary">Adicionar</button></a>
@endsection