<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cliente;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function validarCliente($request){
    $validator = Validator::make($request->all(), [
            "nome"      => "required",
            "CPF"       => "numeric",
            "endereco"  => "required",
            "bairro"    => "required",
            "telefone"  => "required | numeric",
            "celular"   => "required | numeric",
            "sexo"      => "required",
   ]);
   return $validator;
}

    public function index(Request $request)
    {
       
        $qtd = $request['qtd'] ?: 5;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];
        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });
        if($buscar)
        {
            $clientes = DB::table('clientes')->where('clientes.Nome', 'like', '%'.$buscar.'%' )->paginate($qtd);

        }else
        {
            $clientes = DB::table('clientes')->paginate($qtd);
        }
        $clientes = $clientes->appends(Request::capture()->except('page'));
        return view('cliente.index', compact('clientes'));

        /* $clientes = Cliente::all();
         return view('cliente.index', compact('clientes'));*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cliente.create');
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $this->validarCliente($request);
       
        if($validator->fails()){
        return redirect()->back()->withErrors($validator->errors());
        }

         $dados = $request->all();
         Cliente::create($dados);
         return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.edit', compact('cliente'));
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
        $validator = $this->validarCliente($request);
        if($validator->fails()){
        return redirect()->back()->withErrors($validator->errors());
        }

        $cliente = Cliente::find($id);
        $dados = $request->all();
        $cliente->update($dados);
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(DB::table('animais')->where('id_cliente', $id)->count())
        {
            $msg = "Não é possível excluir este Cliente. 
                    Existe(m) animais com id(s) ( ";

            $animais = DB::table('animais')->where('id_cliente', $id)->get();
            foreach($animais as $animal)
            {
                $msg .= $animal->id_animal.",";
            }
            $msg .= " ) que estão relacionado(s) com este Cliente";
        \Session::flash('mensagem', ['msg'=>$msg]);
            return redirect()->route('cliente.remove', $id);
        }
       
        Cliente::find($id)->delete();
        return redirect()->route('cliente.index');
    }

    public function remover($id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.remove', compact('cliente'));
    }
}
