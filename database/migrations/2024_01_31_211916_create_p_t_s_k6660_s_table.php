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
        Schema::create('ptsk6660', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nama');
            $table->integer('cpl2');
            $table->integer('cpl3');
            $table->integer('cpl4');
            $table->integer('cpl6');
            $table->string('outcome');
            $table->integer('cpmk1');
            $table->integer('cpmk2');
            $table->integer('cpmk3');
            $table->integer('cpmk4');
            $table->integer('cpmk5');
            $table->integer('cpmk6');
            $table->integer('cpmk7');
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
        Schema::dropIfExists('ptsk6660');
    }
};
