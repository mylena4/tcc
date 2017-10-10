<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdemPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_pedido', function (Blueprint $table) {
            $table->integer('pedi_id')->unsigned();
            $table->integer('clie_id')->unsigned();
            $table->integer('prod_id')->unsigned();
            $table->integer('qtd_prod')->unsigned();
            $table->float('val_tot');
            $table->foreign('prod_id')->references('id')->on('produtos');
            $table->foreign('clie_id')->references('id')->on('clientes');
            $table->foreign('pedi_id')->references('id')->on('pedidos');
            $table->primary(['prod_id','clie_id','pedi_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordem_pedido');
    }
}
