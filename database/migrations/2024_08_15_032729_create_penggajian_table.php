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
        Schema::create('penggajian', function (Blueprint $table) {
            $table->id('penggajian_id');
            $table->foreignId('pegawai_id')->constrained('pegawai', 'pegawai_id')->onDelete('cascade');
            $table->string('periode', 20);
            $table->decimal('gaji_total', 10, 2)->nullable();
            $table->decimal('potongan_total', 10, 2)->nullable();
            $table->decimal('lembur', 10, 2)->nullable();
            $table->decimal('gaji_bersih', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggajian');
    }
};
