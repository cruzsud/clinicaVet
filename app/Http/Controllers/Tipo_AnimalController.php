<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipo_animal; 
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class Tipo_AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        protected function validarTipo_Animal($request){
            $validator = Validator::make($request->all(), [
                    "dstip" => "required"            
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
            $tipo_animal = DB::table('tipo_animais')->where('tipo_animais.dstip', 'like', '%'.$buscar.'%' )->paginate($qtd);
        }else
        {
            $tipo_animal = DB::table('tipo_animais')->paginate($qtd);
        }
        $tipo_animal = $tipo_animal->appends(Request::capture()->except('page'));
        return view('tipo_animal.index', compact('tipo_animal'));

        /* $tipo_animal = Tipo_Animal::all();
         return view('tipo_animal.index', compact('tipo_animal'));*/
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function create()
    {
        return view('Tipo_Animal.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validarTipo_Animal($request);
        if($validator->fails()){
        return redirect()->back()->withErrors($validator->errors());
        }
         $dados = $request->all();
         Tipo_animal::create($dados);
         return redirect()->route('tipo_animal.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_animal= Tipo_Animal::find($id);
 
        return view('tipo_animal.show', compact('tipo_animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_animal= Tipo_Animal::find($id);
        return view('tipo_animal.edit', compact('tipo_animal'));
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
        $validator = $this->validarTipo_Animal($request);
        if($validator->fails()){
        return redirect()->back()->withErrors($validator->errors());
        }

        $tipo_animal = Tipo_Animal::find($id);
        $dados = $request->all();
        $tipo_animal->update($dados);
        return redirect()->route('tipo_animal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(DB::table('animais')->where('id_tipo', $id)->count())
        {
            $msg = "Não é possível excluir esta Especie. 
                    Existe(m) animais com id(s) ( ";
                    
            $animais = DB::table('animais')->where('id_tipo', $id)->get();
            foreach($animais as $animal)
            {
                $msg .= $animal->id_animal.",";
            }
            $msg .= " ) que estão relacionado(s) com esta especie";
        \Session::flash('mensagem', ['msg'=>$msg]);
            return redirect()->route('tipo_animal.remove', $id);
        }

        Tipo_Animal::find($id)->delete();
        return redirect()->route('tipo_animal.index');
    }

    public function remover($id)
    {
        $tipo_animal = Tipo_Animal::find($id);
        return view('tipo_animal.remove', compact('tipo_animal'));
    }
}
