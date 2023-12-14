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
        //
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim',20)->primary();
            $table->string('nama');
            $table->integer('umur');
            $table->string('email');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('alamat');
            $table->string('created_at');
            $table->string('updated_at')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('mahasiswa');
    }
};
