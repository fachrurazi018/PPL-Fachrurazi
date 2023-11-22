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
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nib');
            $table->string('nama_usaha');
            $table->string('pemilik_usaha');
            $table->enum('jenis',['Perdagangan', 'Jasa', 'Industri Kreatif']);
            $table->string('alamat');
            $table->bigInteger('no_telpon');
            $table->string('media_promosi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
