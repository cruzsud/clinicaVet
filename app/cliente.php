<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
   protected $primaryKey = 'id_cliente';
   protected $fillable = [
       "cpf","nome","endereco","bairro","telefone","celular","email","nascimento", "sexo"
    ];
    protected $table = "clientes";

   
}
