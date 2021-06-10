<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor_total',15,2);
            $table->foreignId('id_users')->constrained('users');
            $table->foreignId('id_endereco')->constrained('endereco');
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
        Schema::table('venda', function (Blueprint $table) {
            $table->dropForeign(['id_users']);
            $table->dropColumn('id_users');
            $table->dropForeign(['id_endereco']);
            $table->dropColumn('id_endereco');
        });
        Schema::dropIfExists('venda');
    }
}
