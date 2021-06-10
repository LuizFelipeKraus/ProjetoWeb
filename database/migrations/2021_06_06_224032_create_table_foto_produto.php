<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFotoProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome_arquivo');
            $table->foreignId('id_produto')->constrained('produto');
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
        Schema::table('foto_produto', function (Blueprint $table) {
            $table->dropForeign(['id_produto']);
            $table->dropColumn('id_produto');
        });
        Schema::dropIfExists('foto_produto');
    }
}
