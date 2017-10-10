<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_material', function (Blueprint $table) {
            $table->integer('prod_id')->unsigned();
            $table->integer('mate_id')->unsigned();
            $table->foreign('prod_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('mate_id')->references('id')->on('materiais')->onDelete('cascade');
            $table->primary(['prod_id','mate_id']);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('produto_material');
    }
}
