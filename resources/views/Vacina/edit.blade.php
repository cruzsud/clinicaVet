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
        <div class="panel-heading"><h3>Edite os Dados da Vacina</h3></div>
        <div class="panel-body">
            <form method="post" action="{{route('vacina.update', $vacina->id_vacina)}}">  
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}   

        <h4>Dados da Vacina</h4>
                <hr>
                <div class="form-group">
                    <label for="codigo">Codigo</label>
                    <input type="text" class="form-control" placeholder="EX:AI000KDH9836" name="codigo" value="{{$vacina->codigo}}" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="desvac">Descrição</label>
                            <input type="text" class="form-control" placeholder="descrição" name="desvac" value="{{$vacina->desvac}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="data">Validade</label>
                            <input type="date" class="form-control" placeholder="Ex: dd/mm/aaaa" required name="data" value="{{$vacina->data}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dose">Dose:</label>
                            <select class="form-control" name="dose">
                                    <option value="1" {{($vacina->dose =="1" ? "selected " : "" )}}>1</option>
                                    <option value="2" {{($vacina->dose =="2" ? "selected " : "" )}}>2</option>
                                    <option value="3" {{($vacina->dose =="3" ? "selected " : "" )}}>3</option>
                                    <option value="4" {{($vacina->dose =="4" ? "selected " : "" )}}>4</option>
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