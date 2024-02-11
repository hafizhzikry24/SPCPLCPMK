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
        Schema::create('pengampu_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->string('NIP');
            $table->string('Kode_MK');
            $table->timestamps();

            // Define foreign keys
            $table->foreign('NIP')->references('NIP')->on('dosens')->onDelete('cascade');
            $table->foreign('Kode_MK')->references('Kode_MK')->on('mata_kuliahs')->onDelete('cascade');

            // Add any additional columns you may need in the pivot table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengampu_matakuliah');
    }
};
