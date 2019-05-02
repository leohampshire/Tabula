<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('user_type_id');
            $table->char('login', 45);
            $table->string('password');
            $table->integer('country_id');
            $table->string('avatar')->default('default.png');
            $table->char('email', 100)->unique();
            $table->string('cpf', 100)->nullable();
            $table->string('birthdate', 10)->nullable();
            $table->string('sex', 45)->nullable();
            $table->string('occupation', 100)->nullable();
            $table->string('interest')->nullable();
            $table->text('bio')->nullable();
            $table->string('website', 100)->nullable();
            $table->string('google_plus', 100)->nullable();
            $table->string('twitter', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('youtube', 100)->nullable();
            $table->integer('state_id')->nullable();
            $table->string('address', 100)->nullable();
            $table->integer('number')->nullable();     
            $table->string('city', 100)->nullable();
            $table->string('cep', 100)->nullable();
            $table->integer('schooling_id')->nullable();
            $table->string('img_avatar')->nullable();
            $table->integer('empresa_id')->nullable();
            $table->integer('course_type')->nullable();
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
        Schema::drop('admins');
    }
}
