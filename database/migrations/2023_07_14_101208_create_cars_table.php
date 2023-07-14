<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_model_id');
            $table->integer('year');
            $table->string('color');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('car_model_id')
                ->references('id')
                ->on('car_models')
                ->onDelete('cascade');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
