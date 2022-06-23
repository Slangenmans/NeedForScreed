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
        Schema::create('segments', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->boolean('isIsolation');
            $table->integer('thicknessIsolation');
            $table->integer('isDoneIsolation');
            $table->boolean('isFloor');
            $table->integer('thicknessFloor');
            $table->integer('isDoneFloor');
            $table->string('segment');
            $table->float('square_meters');
            $table->float('price_per_unit');
            $table->float('price_per_segment');
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
        Schema::dropIfExists('segments');
    }
};
