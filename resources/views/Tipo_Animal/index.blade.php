@extends('shared.base')
@section('content')
    <div class="panel panel-default">    
        <div class="panel-heading">Tipos de Animais</div>
        <form method="GET" action="{{route('tipo_animal.index')}}">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Digite do tipo de Animal" name="buscar">
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
                            <th>Especie</th>
                            <th>Raça</th>
                            <th>Porte</th>
                            <th>Ações</th>
                        </tr>
                    </thead>            
                    <tbody>            
                        @foreach($tipo_animal as $tipo)
                            <tr>
                                <td>{{$tipo->dstip}}</td>
                                <td>{{$tipo->raca}}</td>
                                <td>{{$tipo->porte}}</td>
                                <td>
                                    <a href="{{route('tipo_animal.edit', $tipo->id_tipo)}}"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="{{route('tipo_animal.remove', $tipo->id_tipo)}}"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="{{route('tipo_animal.show', $tipo->id_tipo)}}"><i class="glyphicon glyphicon-zoom-in"></i></a>
                                </td>                                
                            </tr>                         
                        @endforeach                                
                    </tbody>
                </table> 
            </div> 
        </div>
        <div align="center" class="row">
    </div>
    <div align="center" class="row">
            {{ $tipo_animal->links() }}
    </div>
    </div>
    <a href="{{route('tipo_animal.create')}}"><button class="btn btn-primary">Adicionar</button></a>
@endsection