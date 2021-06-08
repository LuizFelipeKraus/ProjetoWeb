<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableVendaProdutoAdicionarIdVenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('venda_produto', function (Blueprint $table) {
            $table->foreignId('id_venda')->constrained('venda');
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
            $table->dropForeign(['id_venda']);
            $table->dropColumn('id_venda');
        });
    }
}
