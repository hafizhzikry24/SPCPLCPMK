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
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_MK')->index();
            $table->string('Mata_Kuliah');
            $table->string('semester');
            $table->integer('SKS');
            $table->string('NIP1');
            $table->string('NIP2')->nullable();
            $table->string('NIP3')->nullable();
            $table->string('NIP4')->nullable();
            $table->text('cpmk');
            $table->text('cpl');
            $table->string('tahun_akademik');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mata_kuliahs');
    }
};
