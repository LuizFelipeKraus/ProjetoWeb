<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVendaProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_produto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_produto')->constrained('produto');
            $table->integer('quantidade_comprada');
            $table->decimal('sub_total',15,2);
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
        Schema::table('venda_produto', function (Blueprint $table) {
            $table->dropForeign(['id_produto']);
            $table->dropColumn('id_produto');
        });
        Schema::dropIfExists('venda_produto');
    }
}
