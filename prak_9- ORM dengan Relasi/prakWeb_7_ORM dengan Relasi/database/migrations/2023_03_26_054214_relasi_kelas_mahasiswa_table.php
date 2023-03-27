<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropColumn('kelas'); // hapus kolom kelas
            $table->unsignedBigInteger('kelas_id')->nullable(); // tambah kolom kelas_id
            $table
                ->foreign('kelas_id')
                ->references('id')
                ->on('kelas'); // buat relasi foreign key ke tabel kelas (id)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->string('kelas');
            $table->dropForeign(['kelas_id']);
        });
    }
};
