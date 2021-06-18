<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
   protected $fillable = ['nome', 'data_nasc','sexo','cep','endereco','estado','bairro', 'numero','complemento','cidade'];
   
}
