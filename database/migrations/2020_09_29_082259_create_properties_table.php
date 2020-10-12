<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('for');
            $table->string('name')->nullable();
            $table->string('contact')->nullable();
            $table->string('image')->nullable();
            $table->string('title');
            $table->foreignId('city_id')->constrained('cities');
            $table->string('address_line')->nullable();
            $table->text('facilities')->nullable();
            $table->text('features')->nullable();
            $table->text('description')->nullable();
            $table->integer('price');
            $table->string('price_per');
            $table->string('location')->nullable();
            $table->string('area')->nullable();
            $table->string('expiry')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('properties');
    }
}
