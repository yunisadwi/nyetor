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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('motor_id')->constrained(); // Menambahkan relasi dengan tabel motor
            $table->string('nama_lengkap');
            $table->string('alamat_lengkap');
            $table->string('nomer_wa');
            $table->date('tanggal_penyewaan')->nullable()->default(now()->toDateString()); // Menambahkan default untuk tanggal
            $table->integer('durasi_sewa')->default(1); // Menambahkan default value untuk durasi sewa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
