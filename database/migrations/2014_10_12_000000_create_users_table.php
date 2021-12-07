<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('biography')->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable(); // male or female
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('credits')->default(5);
            $table->json('social_links');
            $table->string('role')->default('user'); // user, moderator, admin
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
