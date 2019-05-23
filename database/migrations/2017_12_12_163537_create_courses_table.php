<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->double('price');
            $table->longtext('desc');
            $table->integer('user_id_owner');
            $table->integer('category_id');
            $table->string('urn');
            $table->integer('subcategory_id')->nullable();
            $table->text('requirements')->nullable();
            $table->boolean('avaliable')->nullable();
            $table->boolean('company')->nullable();
            $table->string('video')->nullable();
            $table->boolean('featured')->default(0);
            $table->integer('total_class')->nullable();
            $table->string('thumb_img')->nullable();
            $table->string('timeH')->nullable();
            $table->string('timeM')->nullable();
            $table->integer('course_type');
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
        Schema::dropIfExists('courses');
    }
}
