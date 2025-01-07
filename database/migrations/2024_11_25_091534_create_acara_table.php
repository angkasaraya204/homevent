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
        Schema::create('acara', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug');
            $table->string('gambar')->nullable();
            $table->string('tanggal');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade')->onUpdate('cascade'); // Menambahkan kolom kategori_id
            $table->string('link');
            $table->string('tempat');
            $table->string('deskripsi');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): vostring
    {
        Schema::dropIfExists('acara');
    }
};
