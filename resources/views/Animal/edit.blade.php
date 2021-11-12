@extends('shared.base')
@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

<?php $id    = $animal->id_animal;
      $barra = '/';
      $img   = $animal->foto;
?>

    <div class="panel panel-default">
        <div class="panel-heading"><h3>Edite os Dados do Animal</h3></div>
        <div class="panel-body">
            <form method="post" action="{{route('animal.update', $animal->id_animal)}}">  
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}          
                <h4>Dados do Animal</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
<?php               $url = Storage::url('upload/'.$id.$barra.$img) ?>
                    <span ><img width="200px" height="150px" align="right" src='{{$url}}'/></span>
                    </div>
                </div>
        </div>
        <hr>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" placeholder="Nome do Animal" name="nome" value="{{$animal->nome}}" required>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nascimento">Nascimento</label>
                    <input type="date" class="form-control" placeholder="Nascimento" name="nascimento" value="{{$animal->nascimento}}" required>
                </div>
        
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_tipo">Especie</label>
                        <?php  $tipo_animal = DB::table('tipo_animais')->orderBy('dstip', 'ASC')->get();
                        ?>
                    <select class="form-control" name="id_tipo" value="{{$animal->id_tipo}}" required>
                     @foreach($tipo_animal as $tipo)
                        <option value="{{$tipo->id_tipo}}" {{($tipo->id_tipo =="$animal->id_tipo" ? "selected " : "" )}}>{{$tipo->dstip}}</option>
                     @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_cliente">Cliente</label>
                    <?php  $cliente = DB::table('clientes')->select('id_cliente', 'Nome')->orderBy('Nome', 'ASC')->get();?>
                    <select class="form-control" name="id_cliente"  value ="{{$animal->id_cliente}}" required>
                        @foreach($cliente as $cl)
                            <option value="{{$cl->id_cliente}}" <?php echo ($cl->id_cliente == "$animal->id_cliente" ? "selected" : "" )?> > {{$cl->Nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
					<div class="form-group">
						<label for="cor">Cor</label>
						<select class="form-control" name="cor"  value="{{$animal->cor}}" required>
							<option value="Branco"  {{($animal->cor == "Branco" ? "selected" :"")}}>Branco</option>
							<option value="Preto"   {{($animal->cor == "Preto"  ? "selected" :"")}}>Preto</option>
							<option value="Amarelo" {{($animal->cor == "Amarelo"? "selected" :"")}}>Amarelo</option>
                            <option value="Malhado" {{($animal->cor == "Malhado"? "selected" :"")}}>Malhado</option>
                            <option value="Marrom"  {{($animal->cor == "Marrom" ? "selected" :"")}}>Marrom</option>
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