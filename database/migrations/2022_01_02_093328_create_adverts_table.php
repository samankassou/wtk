<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type')->default('rent'); // rent or sale
            $table->string('description')->nullable(); // short description
            $table->text('content'); // full description
            $table->string('location'); // neighborhood
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->tinyInteger('number_of_bedrooms')->default(0);
            $table->tinyInteger('number_of_bathrooms')->default(0);
            $table->tinyInteger('number_of_floors')->default(0);
            $table->tinyInteger('square')->default(1); // m2
            $table->integer('price');
            $table->json('features'); // Wifi, Parking, Security, balcon ...
            $table->string('youtube_video_thumbnail')->nullable();
            $table->string('youtube_video_url')->nullable();
            $table->string('status')->default('renting'); // Not available, preparing selling, selling, sold, renting, rented, building
            $table->integer('visit_fees')->nullable(); // visit fees
            $table->integer('commission')->nullable(); // comission fees
            $table->integer('category_id')->unsigned()->references('id')->on('categories')->index();
            $table->integer('city_id')->unsigned()->references('id')->on('cities')->index();
            $table->integer('user_id')->unsigned()->references('id')->on('users')->index();
            $table->integer('created_by')->unsigned()->references('id')->on('users')->index();
            $table->integer('updated_by')->unsigned()->references('id')->on('users')->index();
            $table->integer('deleted_by')->unsigned()->references('id')->on('users')->index();
            $table->softDeletes();
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
        Schema::dropIfExists('adverts');
    }
}
