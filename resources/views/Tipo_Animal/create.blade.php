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
 
        <div class="panel-heading"><h3>Cadastre o Tipo de Animal </h3></div>
        <div class="panel-body">
 
			<form method="post" action="{{route('tipo_animal.store')}}" >
				{{ csrf_field() }}
				<h4>Dados da Especie Animal</h4>
				<hr>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="nome">Especie</label>
						<input type="text" class="form-control" placeholder="Descrição" name="dstip" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="porte">Porte</label>
						<select class="form-control" name="porte" required>
							<option value="1">Pequeno</option>
							<option value="2">Médio</option>
							<option value="3">Grande</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
						<div class="form-group">
							<label for="raca">Raça</label>
							<input type="text" class="form-control" placeholder="Raça" name="raca" required>
						</div>
				</div>
			</div>
					<a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
				<button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
        </div>
    </div>
 
@endsection