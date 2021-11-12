<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Clinica Caopanheiro</title>

         <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <script src="../../js/jquery-3.2.1.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/dropdown.js"></script>
        <style>
            body { padding-top: 70px; }
        </style>
    </head>

    <body>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                     aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="inicio.index">Inicio</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('animal.index', 'tipo=animal')}}">Animais</a></li>
                        <li><a href="{{route('cliente.index', 'tipo=cliente')}}">Clientes</a></li>
                        <li><a href="{{route('tipo_animal.index', 'tipo=tipo_animal')}}">Espécies</a></li>
                        <li><a href="{{route('consulta.index', 'tipo=consulta')}}">Consultas</a></li>
                        <li><a href="{{route('vacina.index', 'tipo=vacina')}}">Vacinas</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>