<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_items', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('name');
            $table->longtext('desc')->nullable();
            $table->integer('course_item_chapter_id');
            $table->integer('course_item_types_id');
            $table->string('path')->nullable();
            $table->integer('course_items_parent')->nullable();
            $table->longtext('order');
            $table->boolean('free_item')->nullable();
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
        Schema::dropIfExists('course_items');
    }
}
