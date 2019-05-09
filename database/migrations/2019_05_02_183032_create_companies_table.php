<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->string('email', 191)->unique();
            $table->string('password', 191);
            $table->string('avatar')->default('default.png');
            $table->longtext('bio', 255)->nullable();
            $table->string('occupation', 191)->nullable();
            $table->string('website', 191)->nullable();
            $table->string('google_plus', 191)->nullable();
            $table->string('twitter', 191)->nullable();
            $table->string('facebook', 191)->nullable();
            $table->string('youtube', 191)->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
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
        Schema::drop('companies');
    }
}
