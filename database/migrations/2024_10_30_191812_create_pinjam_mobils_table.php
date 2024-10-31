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
        Schema::create('pinjam_mobils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mobil');
            $table->unsignedBigInteger('id_user');
            $table->date('tanggal_sewa');
            $table->date('tanggal_kembali');
            $table->decimal('tarif', 8, 3);
            $table->timestamps();

            $table->foreign('id_mobil')->references('id')->on('mobils')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam_mobils');
    }
};
