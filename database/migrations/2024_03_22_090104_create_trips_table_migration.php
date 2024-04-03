<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('destination', 255);
            $table->date('startDate');
            $table->date('endDate');
            $table->boolean('timespan')->nullable();
            $table->integer('duration_in_days')->nullable();
            $table->text('description');
            $table->string('vehicle', 255);
            $table->text('image_link');
            $table->text('trip_link');
            $table->integer('max_travelers');
            $table->integer('min_travelers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
