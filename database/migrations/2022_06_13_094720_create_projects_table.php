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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->decimal('project_code', 6, 0, true);
            $table->string('name');
            $table->string('address')->nullable();
            $table->decimal('revenue', 8, 2)->nullable();
            $table->decimal('costs', 8, 2)->nullable();
            $table->decimal('pNr_euro', 8, 2)->nullable();
            $table->decimal('pNr_percentage', 5, 2)->nullable();
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
        Schema::dropIfExists('projects');
    }
};
