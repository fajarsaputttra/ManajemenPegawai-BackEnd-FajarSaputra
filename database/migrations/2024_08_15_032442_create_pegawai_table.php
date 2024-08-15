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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id('pegawai_id');
            $table->string('nama', 100);
            $table->text('alamat')->nullable();
            $table->string('nomor_kontak', 20)->nullable();
            $table->string('jabatan', 50)->nullable();
            $table->string('departemen', 50)->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->decimal('gaji_pokok', 10, 2)->nullable();
            $table->decimal('tunjangan', 10, 2)->nullable();
            $table->decimal('potongan', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
