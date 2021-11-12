<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\animal;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

protected function validarAnimal($request){
    $validator = Validator::make($request->all(), [
            "nome" => "required",
            "nascimento"=> "required",
            "sexo" => "required",
   ]);
   return $validator;
}

    public function index(Request $request)
    {
        $qtd    = $request['qtd'] ?: 5;
        $page   = $request['page'] ?: 1;
        $buscar = $request['buscar']?:'';
        
        //paginação 
        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });
       
        //busca
        if($buscar){
            //$animais = DB::table('animais')->where('nome', '=', $buscar)->paginate($qtd);
            $animais = DB::table('tipo_animais')->join('animais', 'animais.id_tipo', '=', 'tipo_animais.id_tipo')->join('clientes', 'clientes.id_cliente', '=', 'animais.id_cliente')->where('animais.nome', 'like', '%'.$buscar.'%' )->orderBy('animais.Nome', 'ASC')->paginate($qtd);
        }else{  
           // $animais = DB::table('animais')->paginate($qtd);
            $animais = DB::table('tipo_animais')->join('animais', 'animais.id_tipo', '=', 'tipo_animais.id_tipo')->join('clientes', 'clientes.id_cliente', '=', 'animais.id_cliente')->orderBy('animais.Nome', 'ASC')->paginate($qtd);
        }

        $animais = $animais->appends(Request::capture()->except('page'));
        return view('animal.index', compact('animais'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Animal.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validarAnimal($request);
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator->errors());
            }
        
        $max = DB::table('animais')->max('id_animal');
        $max+=1;
        $dados = $request->all();
        if($request->hasFile('foto'))
        {
            $request->file('foto');
           // $request->foto->store('public');
           //Storage::putfile('public/'.$max, $request->file('foto'));
           $filename = $request->foto->getClientOriginalName();
           $request->foto->storeAs('public/upload/'.$max, $filename);
           $dados['foto']= $filename;
        }

       Animal::create($dados);
       return redirect()->route('animal.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::find($id);
        return view('animal.show', compact('animal'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::find($id);
        return view('animal.edit', compact('animal'));
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
        $validator = $this->validarAnimal($request);
            if($validator->fails()){
           return redirect()->back()->withErrors($validator->errors());
        }

        $animal = Animal::find($id);
        $dados = $request->all();
        $animal->update($dados);
        return redirect()->route('animal.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Animal::find($id)->delete();
        return redirect()->route('animal.index');
    }


    public function upload()

    {
        dd(\Request::all());
        $file =\Request::file('files');
        $animalId = $dados->id_animal;

        $uploadPath = storage_path().'/upload'.'$animalId';  //https://www.youtube.com/watch?v=turxvCQlwYI 
        $fileName = $file->getAnimalOriginalName();
        $date = date_create();
        $data = date_timestamp_get($date);
        $fileName2 = $fileName._.$data;
        return $file->move($uploadPath, $fileName2);


    }

    public function remover($id)
    {
        $animal = Animal::find($id);
        return view('animal.remove', compact('animal'));
    }

}
