<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdutoTamanho extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'produtos_tamanhos';
    protected $primaryKey = 'id_produto_tamanho';
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // campos que podem ser visualizados/manipulados fora da classe
    protected $fillabel = [
        'id_produto',
        'id_tamanho',
        'preco',
        'observacoes',
    ];

    /**
     * ------------------------------------------------------------------------------------------
     *  RELACIONAMENTOS
     * ------------------------------------------------------------------------------------------
     */

     public function produto():object {
        return $this->hasOne(Produto::class, 'id_produto',
                                             'id_produto');
    }

    public function tamanho():object {
        return $this->hasOne(Tamanho::class,'id_tamanho',
                                             'id_tamanho');
    }
}
