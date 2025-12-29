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
        Schema::create('instanses', function (Blueprint $table) {
            $table->id();
            //Kop Surat
            $table->string('name_instansi');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->text('alamat');
            $table->string('logo');

            //Tanda Tangan
            $table->string('kabupaten');
            $table->string('kepala_nama');
            $table->string('kepala_jabatan');
            $table->string('kepala_nip');
            $table->string('ttd_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instanses');
    }
};
