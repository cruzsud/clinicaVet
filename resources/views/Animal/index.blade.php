@extends('shared.base')
@section('content')
    <div class="panel panel-default">    
        <div class="panel-heading">Lista de Animais</div>
        <form method="GET" action="{{route('animal.index', 'buscar')}}">
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
                            <th>Nome</th>
                            <th>Espécie</th>
                            <th>Nascimento</th>
                            <th>Dono</th>
                            <th>Ações</th>
                        </tr>
                    </thead>  
<?php  
     //$Animais = DB::table('tipo_animais')->select( 'animais.nome as nomeanimal', 'clientes.nome as nomecliente', 'animais.nascimento as nascismento', 'tipo_animais.dstip as tipo', 'animais.id_animal as id_animal')->join('animais', 'animais.id_tipo', '=', 'tipo_animais.id_tipo')->join('clientes', 'clientes.id_cliente', '=', 'animais.id_cliente')->orderBy('animais.Nome', 'ASC')->get();
    
?>          
                    <tbody>            
                        @foreach($animais as $ani)
                            <tr>
                                <td>{{$ani->nome}}</td>
                                <td>{{$ani->dstip}}</td>
                                <td>{{$data1 = date("d/m/Y", strtotime($ani->nascimento))}}</td>
                                <td>{{$ani->Nome}}</td>
                                <td>
                                    <a href="{{route('animal.edit', $ani->id_animal)}}"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="{{route('animal.remove', $ani->id_animal)}}"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="{{route('animal.show', $ani->id_animal)}}"><i class="glyphicon glyphicon-zoom-in"></i></a>
                                </td>                                
                            </tr>
                            <?php $a=$ani?>                         
                        @endforeach                                
                    </tbody>
                </table> 
            </div> 
        </div>
        <div align="center" class="row">
        </div>
        <div align="center" class="row">
            {{ $animais->links() }}
        </div>
</div>
    <a href="{{route('animal.create')}}"><button class="btn btn-primary">Adicionar</button></a>
@endsection