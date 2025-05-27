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
        Schema::create('gunungs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_gunung');
            $table->unsignedBigInteger('provinsi_id');
            $table->text('deskripsi');
            $table->string('image');
            $table->json('image_gallery');
            $table->timestamps();

            // foreign key
            $table->foreign('provinsi_id')->references('id')->on('provinsis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gunungs');
    }
};
