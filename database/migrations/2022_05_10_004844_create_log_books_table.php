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
        Schema::create('log_books', function (Blueprint $table) {
            $table->id();
            $table->uuid('mahasiswa_mbkm_id');
            $table->dateTimeTz('tanggal_log');
            $table->string('tempat');
            $table->string('uraian');
            $table->string('rencana_pencapaian');
            $table->boolean('approved_by_dosen')->default(false);
            $table->boolean('approved_by_pembimbing')->default(false);
            $table->timestamps();

            $table->foreign('mahasiswa_mbkm_id')->references('id')->on('mahasiswa_mbkms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_books');
    }
};
