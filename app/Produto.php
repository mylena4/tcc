<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produtos";
    
    protected $fillable = ['nome', 'descricao', 'preco'];
    
    public function materiais() {
        return $this->belongsToMany(Estoque::class, 'produto_material', 'prod_id', 'mate_id');
    }
    
    public function pedidos() {
        return $this->belongsToMany(Pedido::class, 'ordem_pedido', 'prod_id', 'pedi_id');
    }
}
