<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->integer('quantidade');
            $table->decimal('valor',15,2);
            $table->foreignId('id_categoria_produto')->constrained('categoria_produto');
            $table->foreignId('id_plataforma')->constrained('plataforma');
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
        Schema::table('produto', function (Blueprint $table) {
            $table->dropForeign(['id_categoria_produto']);
            $table->dropColumn('id_categoria_produto');
            $table->dropForeign(['id_plataforma']);
            $table->dropColumn('id_plataforma');
        });
        Schema::dropIfExists('produto');
    }
}
