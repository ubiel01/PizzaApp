<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\{
    Cliente,
    ClienteEndereco,
    Status,
    TipoPagamento,
    TipoPedido,
    User,
    PedidoProduto,
};

class Pedido extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // campos que podem ser visualizados/manipulados fora da classe
    protected $fillabel = [
        'id_tipo_pedido',
        'id_user',
        'id_cliente',
        'id_cliete_endereco',
        'id_status',
        'id_tipo_pagamento',
        'total',
        'observacoes',
    ];

    /**
     * ------------------------------------------------------------------------------------------
     *  RELACIONAMENTOS
     * ------------------------------------------------------------------------------------------
     */

        public function usuario():object {
            return $this->belongsTo(User::class, 'id_user', 'id_user');
        }

        public function cliente():object {
            return $this->belongsTo(cliente::class, 'id_cliente', 'id_cliente');
        }

        public function endereco():object {
            return $this->belongsTo(ClienteEndereco::class, 'id_cliente_endereco', 'id_cliente_endereco');
        }

        public function status():object {
            return $this->belongsTo(Status::class, 'id_status', 'id_status');
        }

        public function tipoPedido():object {
            return $this->belongsTo(TipoPedido::class, 'id_tipo_pedido', 'id_tipo_pedidio');
        }

        public function tipoPagamento():object {
            return $this->belongsTo(TipoPagamento::class, 'id_tipo_pagamento', 'id_tipo_pagamento');
        }

        public function produtos():object {
            return $this->belongsTo(pedidoProduto::class, 'id_pedido', 'id_pedido');
        }
}
