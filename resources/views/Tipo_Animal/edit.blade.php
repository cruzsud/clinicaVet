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
        <div class="panel-heading"><h3>Edite os Dados da Espécie</h3></div>
        <div class="panel-body">
            <form method="post" action="{{route('tipo_animal.update', $tipo_animal->id_tipo)}}">  
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}          
                <h4>Dados da Espécie</h4>
        <hr>
        <div class="form-group">
            <label for="Especie">Espécie</label>
            <input type="text" class="form-control" placeholder="Nome da Especie" name="dstip" value="{{$tipo_animal->dstip}}" required>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="raca">Raça</label>
                    <input type="text" class="form-control" placeholder="Nome da Raça" name="raca" value="{{$tipo_animal->raca}}" required>
                </div>
        
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="porte">Porte</label>
                        <select class="form-control" name="porte" value="{{$tipo_animal->porte}}" required>
                            <option value="1" {{($tipo_animal->porte =="pequeno" ? "selected " : "" )}}>Pequeno</option>
                            <option value="2" {{($tipo_animal->porte =="medio"   ? "selected " : "" )}}>Médio</option>
                            <option value="3" {{($tipo_animal->porte =="grande"  ? "selected " : "" )}}>Grande</option>
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