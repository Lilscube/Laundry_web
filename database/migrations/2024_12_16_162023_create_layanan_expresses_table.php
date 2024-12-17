<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('layanan_expresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_layanan_exspres')->constrained('layanans')->onDelete('cascade'); // Relasi ke tabel `layanans`
            $table->string('metode_pembayaran');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('layanan_expresses');
    }
};
