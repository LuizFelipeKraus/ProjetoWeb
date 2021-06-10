<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cpf');
            $table->string('rg');
            $table->date('data_nascimento');
            $table->string('telefone');
            $table->string('permissao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('cpf');
            $table->dropColumn('rg');
            $table->dropColumn('data_nascimento');
            $table->dropColumn('telefone');
            $table->dropColumn('permissao');
        });
        
    }
}
