<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\consulta;
use App\animal;
use App\cliente;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;


class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      protected function validarConsulta($request){
            $validator = Validator::make($request->all(), [
                "id_animal" => "required",
                "dscon"     => "required",
                "data"      => "required"            
        ]);
        return $validator;
        }


    public function index(Request $request)
    {	
		$qtd = $request['qtd'] ?: 4;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];
       
        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });
        if($buscar)
        {
            $consultas = DB::table('consultas')->join('animais', 'animais.id_animal', '=', 'consultas.id_animal')->join('clientes', 'clientes.id_cliente', '=', 'animais.id_cliente')->where('animais.nome', 'like', '%'.$buscar.'%' )->orderBy('animais.Nome', 'ASC')->paginate($qtd);
        }else
        {  
            $consultas = DB::table('consultas')->join('animais', 'animais.id_animal', '=', 'consultas.id_animal')->join('clientes', 'clientes.id_cliente', '=', 'animais.id_cliente')->orderBy('animais.Nome', 'ASC')->paginate($qtd);
        }
        
        $consultas = $consultas->appends(Request::capture()->except('page'));
        return view('consulta.index', compact('consultas'));
		
        /*$consulta = Consulta::all();
         return view('Consulta.index', compact('consultas'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = Cliente::pluck('Nome', 'id_cliente');
        //$cliente = DB::table('clientes')->join('animais', 'clientes.id_cliente', '=', 'animais.id_cliente')->select( 'clientes.nome', 'clientes.id_cliente')->orderBy('clientes.nome', 'ASC')->distinct()->get();
        return view('Consulta.create', compact('cliente'));

        //return view('Consulta.create');
      
    }
    
    // Pegando o Id do Animal AJAX
    public  function getAnimal(Request $request ,$id)
         {
            if($request->ajax()){
                $animal = Animal::animal($id);
                return response()->json($animal);
            }
         }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validarConsulta($request);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }

         $dados = $request->all();
         Consulta::create($dados);
         return redirect()->route('consulta.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $consulta = Consulta::find($id);
        return view('consulta.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = Consulta::find($id);
        return view('consulta.edit', compact('consulta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validarConsulta($request);
        if($validator->fails()){
        return redirect()->back()->withErrors($validator->errors());
        }

        $consulta = Consulta::find($id);
        $dados = $request->all();
        $consulta->update($dados);
        return redirect()->route('consulta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Consulta::find($id)->delete();
        return redirect()->route('consulta.index');
    }

    public function remover($id)
    {
        $consulta = Consulta::find($id);
        return view('consulta.remove', compact('consulta'));
    }
}
