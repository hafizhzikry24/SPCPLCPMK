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
        Schema::create('evaluasi_cpmk', function(Blueprint $table){
            $table->id('id_evaluasi');
            $table->string('id_eval_matkul');
            $table->string('tahun_akademik_eval');
            $table->string('semester_eval');
            $table->string('cpmk');
            $table->integer('rerata');
            $table->integer('ambang');
            $table->string('memenuhi');
            $table->string('analisis_pelaksanaan');
            $table->string('rencana_perbaikan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        {
            Schema::dropIfExists('evaluasi_cpmk');
        }
    }
};
