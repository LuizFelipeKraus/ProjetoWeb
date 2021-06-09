<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->string('logradouro');
            $table->integer('numero');
            $table->string('bairro');
            $table->foreignId('id_cidade')->constrained('cidade');
            $table->foreignId('id_users')->constrained('users');
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
        Schema::table('endereco', function (Blueprint $table) {
            $table->dropForeign(['id_cidade']);
            $table->dropColumn('id_cidade');
            $table->dropForeign(['id_users']);
            $table->dropColumn('id_users');
        });
        Schema::dropIfExists('endereco');
    }
}
