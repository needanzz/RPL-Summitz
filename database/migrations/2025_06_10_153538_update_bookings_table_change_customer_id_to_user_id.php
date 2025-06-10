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
        Schema::table('bookings', function (Blueprint $table) {
            //
            // Hapus foreign key constraint lama
            $table->dropForeign(['customer_id']);
            // Hapus kolom customer_id
            $table->dropColumn('customer_id');
            // Tambahkan kolom user_id dengan foreign key baru
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
            // Hapus foreign key constraint baru
            $table->dropForeign(['user_id']);
            // Hapus kolom user_id
            $table->dropColumn('user_id');
            // Tambahkan kembali kolom customer_id dengan foreign key lama
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
        });
    }
};
