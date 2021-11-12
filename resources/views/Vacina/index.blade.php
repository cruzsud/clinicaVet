@extends('shared.base')
@section('content')
    <div class="panel panel-default">    
        <div class="panel-heading">Lista de Vacinas</div>
        <form method="GET" action="#">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Digite o codigo da Vacina" name="buscar">
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
                            <th>Codigo</th>
                            <th>Descrição</th>
                            <th>Validade</th>
                            <th>Dose</th>
                            <th>Ações</th>
                        </tr>
                    </thead>            
                    <tbody>            
                        @foreach($vacina as $vacinas)
                            <tr>
                                <td>{{$vacinas->codigo}}</td>
                                <td>{{$vacinas->desvac}}</td>
                                <td>{{$data1 = date("d/m/Y", strtotime($vacinas->data))}}</td>
                                <td>{{$vacinas->dose}}</td>
                                <td>
                                    <a href="{{route('vacina.edit', $vacinas->id_vacina)}}"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="{{route('vacina.remove', $vacinas->id_vacina)}}"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="{{route('vacina.show', $vacinas->id_vacina)}}"><i class="glyphicon glyphicon-zoom-in"></i></a>
                                </td>                                
                            </tr>                         
                        @endforeach                                
                    </tbody>
                </table> 
            </div> 
        </div>
        <div align="center" class="row">
		{{ $vacina->links() }}
        </div>
    </div>
    <a href="{{route('vacina.create')}}"><button class="btn btn-primary">Adicionar</button></a>
@endsection