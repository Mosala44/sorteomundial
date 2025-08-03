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
        Schema::create('grupo', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('sorteo_id');

            // FOREIGN KEYS A LOS BOMBOS
            $table->unsignedBigInteger('bombo1_id');
            $table->unsignedBigInteger('bombo2_id');
            $table->unsignedBigInteger('bombo3_id');
            $table->unsignedBigInteger('bombo4_id');

            //RELACIONES
            $table->foreign('sorteo_id')->references('id')->on('sorteo')->onDelete('cascade');
            $table->foreign('bombo1_id')->references('id')->on('bombo1')->onDelete('cascade');
            $table->foreign('bombo2_id')->references('id')->on('bombo2')->onDelete('cascade');
            $table->foreign('bombo3_id')->references('id')->on('bombo3')->onDelete('cascade');
            $table->foreign('bombo4_id')->references('id')->on('bombo4')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo');
    }
};
