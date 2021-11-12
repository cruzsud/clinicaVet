@extends('shared.base')
@section('content')
    <div class="panel panel-default">    
        <div class="panel-heading">Lista de Clientes</div>
        <form method="GET" action="{{route('cliente.index')}}">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Digite o nome do Cliente" name="buscar">
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
                            <th>CPF</th>
                            <th>Nome</th>
                            <th>Celular</th>
                            <th>E-MAIL</th>
                            <th>Ações</th>
                        </tr>
                    </thead>            
                    <tbody>            
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->cpf}}</td>
                                <td>{{$cliente->Nome}}</td>
                                <td>{{$cliente->Celular}}</td>
                                <td>{{$cliente->email}}</td>
                                <td>
                                    <a href="{{route('cliente.edit', $cliente->id_cliente)}}"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="{{route('cliente.remove',$cliente->id_cliente)}}"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="{{route('cliente.show', $cliente->id_cliente)}}"><i class="glyphicon glyphicon-zoom-in"></i></a>
                                </td>                                
                            </tr>                         
                        @endforeach                                
                    </tbody>
                </table> 
            </div> 
        </div>
        <div align="center" class="row">
            {{ $clientes->links() }}
        </div>
    </div>
    <a href="{{route('cliente.create')}}"><button class="btn btn-primary">Adicionar</button></a>
@endsection