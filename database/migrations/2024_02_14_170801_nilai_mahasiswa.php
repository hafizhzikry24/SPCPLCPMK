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
        Schema::create('Nilai_Mahasiswa', function(Blueprint $table){
            $table->id();
            $table->string('id_matkul');
            $table->integer('tahun');
            $table->string('semester');
            $table->bigInteger('nim');
            $table->string('nama');
            $table->integer('cpl1')->nullable();
            $table->integer('cpl2')->nullable();
            $table->integer('cpl3')->nullable();
            $table->integer('cpl4')->nullable();
            $table->integer('cpl5')->nullable();
            $table->integer('cpl6')->nullable();
            $table->integer('cpl7')->nullable();
            $table->integer('cpl8')->nullable();
            $table->integer('cpl9')->nullable();
            $table->integer('cpl10')->nullable();
            $table->integer('cpl11')->nullable();
            $table->integer('cpl12')->nullable();
            $table->string('outcome');
            $table->integer('cpmk1')->nullable();
            $table->integer('cpmk2')->nullable();
            $table->integer('cpmk3')->nullable();
            $table->integer('cpmk4')->nullable();
            $table->integer('cpmk5')->nullable();
            $table->integer('cpmk6')->nullable();
            $table->integer('cpmk7')->nullable();
            $table->integer('cpmk8')->nullable();
            $table->integer('cpmk9')->nullable();
            $table->integer('cpmk10')->nullable();
            $table->timestamps();

            $table->foreign('id_matkul')->references('kode_MK')->on('mata_kuliahs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Nilai_Mahasiswa');
    }
};
