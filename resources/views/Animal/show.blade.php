@extends('shared.base')
@section('content')

<?php 


    $id   = $animal->id_animal;
    $barra = '/';  
    $Animais = DB::table('tipo_animais')->select( 'animais.nome as nomeanimal', 'clientes.nome as nomecliente', 'animais.nascimento as nascimento', 'tipo_animais.dstip as tipo', 'animais.id_animal as id_animal', 'animais.cor as cor','clientes.endereco as end', 'clientes.telefone as tel', 'animais.foto')->join('animais', 'animais.id_tipo', '=', 'tipo_animais.id_tipo')->join('clientes', 'clientes.id_cliente', '=', 'animais.id_cliente')->where('animais.id_animal','=',$id)->orderBy('animais.Nome', 'ASC')->get();
   
    foreach($Animais as $pos=>$a)
    {
        $img= $a->foto;
    }

?>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Detalhes</div>
        <div class="panel-body">  
            <div class="row">
                <div class="col-md-6">
                    <h4>Sobre o Animal</h4>
                    @foreach($Animais as $ani)
                    <p>Nome:        {{$ani->nomeanimal}}</p>
                    <p>Nascimento:  {{$data1 = date("d/m/Y", strtotime($ani->nascimento))}}</p>
                    <p>Especie:     {{$ani->tipo}}</p>
                    <p>Cor:         {{$ani->cor}}</p>
                    
                    @endforeach
                </div>
                <div class="col-md-6">
<?php               $url = Storage::url('upload/'.$id.$barra.$img) ?>
                    <span ><img width="200px" height="150px" align="right" src='{{$url}}'/></span>
                </div>
                <div class="col-md-12"
                    <hr>
                    <h4>Dono</h4>
                    @foreach($Animais as $cli)
                    <p>Nome:     {{$cli->nomecliente}}</p>
                    <p>Endereço: {{$cli->end}}</p>
                    <p>Telefone: {{$cli->tel}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
@endsection