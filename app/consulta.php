<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class consulta extends Model
{
    protected $primaryKey = 'id_consulta';

    protected $fillable = [
        "id_animal", "data", "dscon", "id_vacina"
      ];
      protected $table = "consultas";
      
}
