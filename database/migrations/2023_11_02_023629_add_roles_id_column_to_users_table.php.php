<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        schema::table('users', function (blueprint $table){
            $table->unsignedBiginteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        schema::table('users', function (Blueprint $table) {
            $table->$table->dropForeign('posts_role_id_foreign');
            $table->$table->dropColumn('role_id');
        });
    }
};
