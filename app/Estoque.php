<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{

    protected $table = "materiais";

    protected $fillable = ['nome', 'descricao', 'preco', 'quantidade', 'forn_id'];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'forn_id');
    }
    
    public function produto() {
        return $this->belongsToMany(Produto::class, 'produto_material', 'mate_id', 'prod_id');   
    }
    
}
