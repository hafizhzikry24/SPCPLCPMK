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
            $table->float('rerata');
            $table->float('ambang');
            $table->string('memenuhi')->nullable();
            $table->string('analisis_pelaksanaan');
            $table->string('rencana_perbaikan');
            $table->float('batas_ambang')->nullable();
            $table->float('batas_rerata')->nullable();
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
        {
            Schema::dropIfExists('evaluasi_cpmk');
        }
    }
};
