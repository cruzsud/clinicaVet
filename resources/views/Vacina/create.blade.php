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
 
        <div class="panel-heading"><h3>Cadastre a Vacina</h3></div>
        <div class="panel-body">
 
    <form method="post" action="{{route ('vacina.store')}}">
        {{ csrf_field() }}
        <h4>Dados da Vacina</h4>
        <hr>
        <div class="form-group">
            <label for="codigo">Codigo</label>
            <input type="text" class="form-control" placeholder="EX:AI000KDH9836" name="codigo" required>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="desvac">Descrição</label>
                    <input type="text" class="form-control" placeholder="descrição" name="desvac" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="data">Validade</label>
                    <input type="date" class="form-control" placeholder="Ex: dd-mm-aaaa" required name="data">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dose">Dose:</label>
                    <select class="form-control" name="dose">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
                            <option value="4">4</option>
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