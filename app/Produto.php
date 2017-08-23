<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produtos";
    
    protected $fillable = ['nome', 'descricao', 'preco'];
    
    public function materiais() {
        return $this->belongsToMany(Produto::class, 'produto_material');
    }
}
