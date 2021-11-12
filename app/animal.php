<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class animal extends Model
{
    protected $primaryKey = 'id_animal';
    protected $fillable = [
      "nome", "nascimento", "foto", "id_cliente", "id_tipo", "cor", "sexo"
    ];
    protected $table = "animais";

   // função para utilizar o Ajax
    public static function animal($id){

        return Animal::where('id_cliente','=',$id)->get();

    }

}
