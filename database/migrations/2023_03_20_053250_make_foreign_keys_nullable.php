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
        Schema::table('cars', function (Blueprint $table) {
            $table->foreignId('car_class_id')->nullable()->change();
            $table->foreignId('car_engine_id')->nullable()->change();
            $table->foreignId('category_id')->nullable()->change();
            $table->foreignId('image_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->foreignId('car_class_id')->constrained();
            $table->foreignId('car_engine_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('image_id')->constrained();
        });
    }
};
