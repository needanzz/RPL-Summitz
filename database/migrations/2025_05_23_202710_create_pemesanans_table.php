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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengguna_id');
            $table->unsignedBigInteger('jadwal_id');
            $table->string('kode_pesanan');
            $table->integer('jumlah_peserta');
            $table->decimal('jumlah_total');
            $table->enum('status_pesanan', ['pending', 'success', 'failed'])->default('pending');
            $table->date('tanggal_pesanan');
            $table->date('batas_pembayaran');
            $table->timestamps();

            //
            $table->foreign('pengguna_id')->references('id')->on('penggunas')->onDelete('cascade');
            $table->foreign('jadwal_id')->references('id')->on('jadwals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
