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
            // decimal: specifies format (6 digits, no decimals)
            // foreignId: establishes relationship with disc. codes table
            $table->id();
            $table->decimal('project_code', 6, 0, true);
            // $table->foreignId('discipline_code')->constrained('discipline_codes');
            $table->string('name');
            $table->string('address')->nullable();
            // $table->string('planner');
            // $table->json('segments');
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
