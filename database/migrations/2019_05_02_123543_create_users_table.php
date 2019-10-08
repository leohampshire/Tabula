<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('user_type_id');
            $table->string('avatar')->default('default.png');
            $table->string('cover')->default('default.png');
            $table->string('cpfcnpj', 100)->nullable();
            $table->string('birthdate', 10)->nullable();
            $table->string('sex', 45)->nullable();
            $table->string('interest')->nullable();
            $table->longtext('bio')->nullable();
            $table->string('website', 100)->nullable();
            $table->string('youtube', 100)->nullable();
            $table->string('google_plus', 100)->nullable();
            $table->string('linkedin', 100)->nullable();
            $table->string('twitter', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('schooling_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->longtext('google_id')->nullable();
            $table->softDeletes();
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
        Schema::drop('users');
    }
}
