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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gunung_id');
            $table->string('trip_name');
            $table->text('deskripsi');
            $table->integer('duration_day');
            $table->decimal('harga');
            $table->integer('max_participants');
            $table->text('fasilitas');
            $table->text('itinerary');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            //
            $table->foreign('gunung_id')->references('id')->on('gunungs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
