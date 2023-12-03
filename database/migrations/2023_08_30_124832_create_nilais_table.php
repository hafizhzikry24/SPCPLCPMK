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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id('id_nilai');
            $table->string('Nilai_Tugas');
            $table->string('Nilai_UTS');
            $table->string('Nilai_Akhir');
            $table->string('Nama_Akhir_Huruf');
            $table->string('Nama');
            $table->string('NIM');
            $table->string('Semester');
            $table->string('Matakuliah');
            $table->string('Tahun_ajaran');
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
        Schema::dropIfExists('nilais');
    }
};
