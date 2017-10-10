<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordem_Pedido extends Model
{
    protected $table = "ordem_pedido";

    protected $fillable = ['pedi_id','clie_id','prod_id', 'qtd_prod', 'val_tot'];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'prod_id');
    }
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clie_id');
    }
    
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedi_id');
    }
    
}
