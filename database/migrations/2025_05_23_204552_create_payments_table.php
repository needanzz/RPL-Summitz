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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemesanan_id');
            $table->decimal('total');
            $table->enum('metode_pembayaran', ['']);
            $table->enum('status_pembayaran', ['pending', 'success', 'failed'])->default('pending');
            $table->string('transaction_id');
            $table->json('gateway_responses');
            $table->date('tanggal_pembayaran');
            $table->timestamps();

            //
            $table->foreign('pemesanan_id')->references('id')->on('pemesanans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
