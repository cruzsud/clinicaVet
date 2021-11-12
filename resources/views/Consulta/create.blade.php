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
          //  $AniCli = DB::table('clientes')->join('animais', 'clientes.id_cliente', '=', 'animais.id_cliente')->select('animais.id_animal as idanimal', 'animais.nome as nomeanimal', 'clientes.nome as nomecliente', 'clientes.id_cliente as id_cliente')->orderBy('animais.Nome', 'ASC')->distinct()->get();

        //   $cli = DB::table('clientes')->select('clientes.id_cliente', 'clientes.Nome')->orderBy('clientes.Nome', 'ASC')->distinct()->get();
 ?>
    <div class="panel panel-default">
 
        <div class="panel-heading"><h3>Cadastre a Consulta</h3></div>
        <div class="panel-body">
 
    <form method="post" action="{{route ('consulta.store')}}">
        {{ csrf_field() }}
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <h4>Dados da Consulta</h4>
        <hr>
    

        <div class="form-group">
            <label for="animal">Cliente:</label>
            {!! Form::select('cliente', $cliente, null,['id'=>'cliente', 'class' => 'form-control']) !!}
               
        </div>
        <div class="form-group">
            <label for="animal">Animal:</label>
            {!! Form::select('id_animal',['placeholder'=>'selecione'], null, ['id'=>'animal', 'class' => 'form-control'])!!}
               
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="consulta">Descrição da Consulta:</label>
                    <textarea cols="7" rows="8" class="form-control" placeholder="" name="dscon" required></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="data">Data:</label>
                    <input type="date" class="form-control" placeholder="Ex: dd-mm-aaaa" required name="data">
                </div>
            </div>
        </div>
         <div class="row"> 
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vacina">Vacina:</label>
                    <select class="form-control" name="id_vacina">
							<option value=""></option>
<?php 
                         $vacina = DB::table('vacina')->select('id_vacina', 'desvac')->orderBy('desvac', 'ASC')->get();
?>
                            @foreach($vacina as $vac)
							<option value="{{$vac->id_vacina}}">{{$vac->desvac}}</option>
                            @endforeach
							
					</select>
                </div>
            </div>
        </div>
            <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
        </div>
    </div>
 
@endsection