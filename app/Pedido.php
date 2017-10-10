<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedidos";

    protected $fillable = ['clie_id', 'data_entr', 'val_tot', 'descricao'];
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clie_id');
    }
    
    public function pedidos() {
        return $this->belongsToMany(Pedido::class, 'ordem_pedido', 'pedi_id', 'prod_id' );
    }
    
}