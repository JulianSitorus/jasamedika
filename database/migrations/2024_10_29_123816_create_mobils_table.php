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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('merk');
            $table->string('nomor_plat');
            $table->decimal('tarif_per_hari', 8, 3);
            $table->enum('model',['Sedan','Hatchback','SUV','Electric','Luxury','Sport','Van','Truk']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
