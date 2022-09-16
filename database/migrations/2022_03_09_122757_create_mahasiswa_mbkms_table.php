<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_mbkms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('dosbing_mbkm_id')->nullable();
            $table->unsignedBigInteger('pembimbing_mbkm_id')->nullable();
            $table->unsignedBigInteger('model_mbkm_id');
            $table->unsignedBigInteger('prodi_id');
            $table->integer('angkatan');
            $table->integer('semester');
            $table->integer('durasi');
            $table->string('nip_dospem');
            $table->string('nama_dospem');
            $table->string('lokasi_mbkm');
            $table->string('alamat_mbkm');
            $table->string('deskripsi_mbkm')->nullable();
            $table->boolean('approved')->default(false);
            $table->boolean('program_dikbud')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('dosbing_mbkm_id')->references('id')->on('users');
            $table->foreign('pembimbing_mbkm_id')->references('id')->on('users');
            $table->foreign('model_mbkm_id')->references('id')->on('modelmbkms');
            $table->foreign('prodi_id')->references('id')->on('prodis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa_mbkms');
    }
};
