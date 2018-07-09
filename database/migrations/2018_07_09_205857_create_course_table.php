<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->timestamps();
        });

        Schema::create('prerequisites', function (Blueprint $table){
           $table->increments('id');
           $table->string('course_code');
        });

        Schema::create('course_prerequisites', function (Blueprint $table){
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('prerequisite_id');

            $table->foreign('course_id')
                ->references('id')
                ->on('course')
                ->onDeleteCascade();

            $table->foreign('prerequisite_id')
                ->references('id')
                ->on('prerequisites')
                ->onDeleteCascade();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_prerequisites');
        Schema::dropIfExists('prerequisites');
        Schema::dropIfExists('course');
    }
}
