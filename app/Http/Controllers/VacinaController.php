<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vacina;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class VacinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function validarVacina($request){
    $validator = Validator::make($request->all(), [
        "codigo" => "required",
        "desvac" => "required",
        "data"   => "required"
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
            $vacina = DB::table('vacina')->where('vacina.codigo', 'like', '%'.$buscar.'%' )->paginate($qtd);
        }else
        {
            $vacina = DB::table('vacina')->paginate($qtd);
        }
        $vacina = $vacina->appends(Request::capture()->except('page'));
        return view('vacina.index', compact('vacina'));
		 
		 /*$vacina = Vacina::all();
         return view('vacina.index', compact('vacina'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        return view('Vacina.create');
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validarVacina($request);
        if($validator->fails()){
        return redirect()->back()->withErrors($validator->errors());
        }

         $dados = $request->all();
         Vacina::create($dados);
         return redirect()->route('vacina.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacina = Vacina::find($id);
        return view('vacina.show', compact('vacina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacina = Vacina::find($id);
        return view('vacina.edit', compact('vacina'));
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
        $validator = $this->validarVacina($request);
        if($validator->fails()){
        return redirect()->back()->withErrors($validator->errors());
        }
        $vacina = Vacina::find($id);
        $dados = $request->all();
        $vacina->update($dados);
        return redirect()->route('vacina.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(DB::table('consultas')->where('id_vacina', $id)->count())
        {
            $msg = "Não é possível excluir esta vacina. 
                    Existe(m) consulta(s) com id(s) ( ";
            $consultas = DB::table('consultas')->where('id_vacina', $id)->get();
            foreach($consultas as $consulta){
            $msg .= $consulta->id_consulta.",";
        }
            $msg .= " ) que estão relacionado(s) com esta vacina";
        \Session::flash('mensagem', ['msg'=>$msg]);
            return redirect()->route('vacina.remove', $id);
        }

        Vacina::find($id)->delete();
        return redirect()->route('vacina.index');
    }

    public function remover($id)
    {
        $vacina = Vacina::find($id);
        return view('vacina.remove', compact('vacina'));
    }
}
