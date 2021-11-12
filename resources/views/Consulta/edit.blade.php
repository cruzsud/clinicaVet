@extends('shared.base')
@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

<?php 

    $id     = $consulta->id_consulta;
    $AniCli = DB::table('consultas')->select('consultas.data as data', 'animais.nome as nomeanimal', 'clientes.nome as nomecliente', 'animais.nascimento as nascimento')->join('animais', 'animais.id_animal', '=', 'consultas.id_animal')->join('clientes', 'clientes.id_cliente', '=', 'animais.id_cliente')->where('consultas.id_consulta', '=', $id)->orderBy('animais.Nome', 'ASC')->get();

    foreach($AniCli as $pos=>$a)
    {
        $nomeanimal  = $a->nomeanimal;
        $nomecliente = $a->nomecliente;
    }

    $vacina = DB::table('vacina')->select('id_vacina', 'desvac')->orderBy('desvac', 'ASC')->get();

 ?>

    <div class="panel panel-default">
        <div class="panel-heading"><h3>Edite os Dados da Consulta</h3></div>
        <div class="panel-body">
            <form method="post" action="{{route('consulta.update', $consulta->id_consulta)}}">  
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id_animal"  value="{{$consulta->id_animal}}">
            {{ csrf_field() }}          
                <h4>Dados da Consulta</h4>
                <hr>
                <div class="form-group">
                    <label for="animal">Animal:</label>
                    <input name="nmani" class="form-control" value="{{$nomeanimal}}" readonly="readonly">  
                </div>
                <div class="form-group">
                    <label for="animal">Cliente:</label>
                    <input name="nmcli" class="form-control" value="{{$nomecliente}}" readonly="readonly">  
                </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="consulta">Descrição da Consulta:</label>
                    <textarea cols="7" rows="8" class="form-control" placeholder="" name="dscon" value="{{$consulta->dscon}}" required>{{$consulta->dscon}}</textarea>
                    
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="data">Data da Consulta:</label>
                    <input type="date" class="form-control" placeholder="Ex: dd-mm-aaaa" value="{{$consulta->data}}" required name="data">
                </div>
            </div>
        </div>
         <div class="row"> 
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vacina">Vacina:</label>
                    <select class="form-control" name="id_vacina" value="{{$consulta->id_vacina}}">
							<option value=""></option>
                                @foreach($vacina as $vac)
                                    <option value="{{$vac->id_vacina}}" {{($vac->id_vacina == "$consulta->id_vacina" ? "selected " : "")}}>{{$vac->desvac}}</option>
                                @endforeach
					</select>
                </div>
            </div>
        </div>
            <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
        </div>
    </div>
 
@endsection