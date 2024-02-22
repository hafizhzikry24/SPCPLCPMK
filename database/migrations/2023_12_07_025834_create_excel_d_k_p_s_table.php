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
        Schema::create('exceldkps', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nama');
            $table->integer('cpl2');
            $table->integer('cpl3');
            $table->integer('cpl5');
            $table->integer('cpl6');
            $table->integer('cpl7');
            $table->integer('cpl9');
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
        Schema::dropIfExists('exceldkps');
    }
};
