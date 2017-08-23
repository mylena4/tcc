<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto_Material extends Model
{
    protected $table = "produto_material";

    protected $fillable = ['prod_id', 'mate_id'];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'prod_id');
    }
    
    public function material()
    {
        return $this->belongsTo(Material::class, 'mate_id');
    }
}
