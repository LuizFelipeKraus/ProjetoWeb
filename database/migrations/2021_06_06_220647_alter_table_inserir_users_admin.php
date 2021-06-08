<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableInserirUsersAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_admin', function (Blueprint $table) {
            $table->foreignId('id_users')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_admin', function (Blueprint $table) {
            $table->dropForeign(['id_users']);
            $table->dropColumn('id_users');
        });
    }
}
