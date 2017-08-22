<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{

    protected $table = "materiais";

    protected $fillable = ['nome', 'descricao', 'preco', 'quantidade', 'fornecedor_id'];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }
    
    public function produtos() {
        return $this->belongsToMany(Produto::class, 'produto_material');
    }
}
