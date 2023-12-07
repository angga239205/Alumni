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
        Schema::create('alumni', function (Blueprint $table) {
            $table->string('nis')->unique();
            $table->string('password');
            $table->string('nama');
            $table->enum('jk',['laki-laki','perempuan']);
            $table->string('jurusan');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('telpon');
            $table->year('thn_ajaran');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
