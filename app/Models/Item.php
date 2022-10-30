<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "item";

    protected $fillable = ['nome', 'preco', 'codigo_barra', 'quantidade', 'unidade_medida', 'valor_unitario', 'sub_total', 'valor_total', 'venda_id', 'user_created_at', 'created_at'];
}
