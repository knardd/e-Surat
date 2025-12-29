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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('ttl');
            $table->string('jk');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->foreignId('jenis_id')->constrained('jenis')->cascadeOnDelete();
            $table->text('isi_id');
            $table->string('no_surat');
            $table->date('tanggal_surat');
            $table->integer('no_urut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
