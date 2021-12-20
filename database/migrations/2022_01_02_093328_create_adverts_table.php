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
            $table->string('moderation_status')->default('pending'); // pending, approved, rejected
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->tinyInteger('number_of_bedrooms')->default(0);
            $table->tinyInteger('number_of_bathrooms')->default(0);
            $table->tinyInteger('number_of_floors')->default(0);
            $table->tinyInteger('square')->default(1); // m2
            $table->integer('price');
            $table->json('features'); // Wifi, Parking, Security, balcon ...
            $table->string('period')->default('month'); // day, month, year
            $table->boolean('is_featured')->default(0);
            $table->string('youtube_video_thumbnail')->nullable();
            $table->string('youtube_video_url')->nullable();
            $table->string('status')->default('renting'); // Not available, preparing selling, selling, sold, renting, rented, building
            $table->integer('visit_fees')->nullable(); // visit fees
            $table->integer('commission')->nullable(); // commission fees
            $table->foreignId('city_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete();
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
