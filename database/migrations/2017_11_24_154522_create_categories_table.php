<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('name');
            $table->string('urn');
            $table->integer('category_id')->nullable();
            $table->integer('desktop_index')->nullable();
            $table->integer('mobile_index')->nullable();
            $table->string('desktop_hex_bg')->nullable();
            $table->string('mobile_hex_bg')->nullable();
            $table->string('hex_icon')->nullable();
            $table->string('hex_course_icon')->nullable();
            $table->string('meta_title')->nullable();
            $table->longtext('meta_description')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
