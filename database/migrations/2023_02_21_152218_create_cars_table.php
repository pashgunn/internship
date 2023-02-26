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
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('body');
            $table->unsignedInteger('price');
            $table->unsignedInteger('old_price')->nullable();
            $table->string('salon')->nullable();
            $table->foreignId('car_class_id')->constrained();
            $table->string('kpp')->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->string('color')->nullable();
            $table->foreignId('car_body_id')->nullable()->constrained();
            $table->foreignId('car_engine_id')->constrained();
            $table->boolean('is_new')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
