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
            $table->string('login', 191);
            $table->longtext('bio', 255);
            $table->string('occupation', 191);
            $table->string('website', 191);
            $table->string('google_plus', 191);
            $table->string('twitter', 191);
            $table->string('facebook', 191);
            $table->string('youtube', 191);
            $table->string('email', 191)->unique();
            $table->integer('country_id');
            $table->integer('state_id')->nullable();
            $table->string('password', 191);
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
