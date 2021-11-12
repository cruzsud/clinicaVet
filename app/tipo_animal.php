<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_animal extends Model
{   
  protected $primaryKey = 'id_tipo';
  
    protected $fillable = [
      "dstip", "porte", "raca"
    ];
    protected $table = "tipo_animais";
}
