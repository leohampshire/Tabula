<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('databanks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->integer('bank_code');
            $table->integer('agencia');
            $table->integer('agencia_dv')->nullable();
            $table->integer('conta');
            $table->integer('conta_dv')->nullable();
            $table->string('document_number');
            $table->integer('user_id');
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
        Schema::dropIfExists('databanks');
    }
}
