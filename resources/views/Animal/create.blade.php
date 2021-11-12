
@extends('shared.base')

 
@section('content')
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

    <div class="panel panel-default">
 
        <div class="panel-heading"><h3>Cadastre o Animal</h3></div>
        <div class="panel-body">
 
    <form method="post" action="{{route ('animal.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

        <h4>Dados do Animal</h4>
        <hr>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" placeholder="Nome" name="nome" required>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nascimento">Nascimento</label>
                    <input type="date" class="form-control" placeholder="Nascimento" name="nascimento"  required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_tipo">Especie</label>
                        <?php  $tipo_animal = DB::table('tipo_animais')->orderBy('dstip', 'ASC')->get();
                        ?>
                    <select class="form-control" name="id_tipo" required>
                     @foreach($tipo_animal as $tipo)
                        <option value="{{$tipo->id_tipo}}">{{$tipo->dstip}}</option>
                     @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_cliente">Cliente</label>
                    <?php  $cliente = DB::table('clientes')->orderBy('Nome', 'ASC')->get();
                        ?>
                    <select class="form-control" name="id_cliente" required>
                        @foreach($cliente as $cl)
                            <option value="{{$cl->id_cliente}}">{{$cl->Nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sexo">Sexo</label><br>
                    <fieldset>
                        <label for="m"><input type="radio" name="sexo" id="M" value="M" class="radio"/> Masculino</label>
                        <label for="f"><input type="radio" name="sexo" id="F" value="F" class="radio"/> Feminino</label>
                </fieldset>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="foto">Foto</label>
                     <input type="file" class="form-control" name="foto" accept="image/x-png,image/gif,image/jpeg,image/jpg" >
                </div>
            </div>
            <div class="col-md-6">
					<div class="form-group">
						<label for="cor">Cor</label>
						<select class="form-control" name="cor" required>
							<option value="Branco">Branco</option>
							<option value="Preto">Preto</option>
							<option value="Amarelo">Amarelo</option>
                            <option value="Malhado">Malhado</option>
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