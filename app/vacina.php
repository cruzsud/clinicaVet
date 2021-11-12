<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vacina extends Model
{
protected $primaryKey = 'id_vacina';
   protected $fillable = [
       "codigo","data","desvac","dose"
    ];
    protected $table = "vacina";


}
