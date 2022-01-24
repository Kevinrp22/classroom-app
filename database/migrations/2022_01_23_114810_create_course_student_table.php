<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_student', function (Blueprint $table) {
            $table->bigInteger("student_id")->unsigned();
            $table->bigInteger("course_id")->unsigned();

            $table->foreign("student_id")->references("id")->on("users")
                ->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("course_id")->references("id")
                ->on("courses")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_student', function (Blueprint $table) {
            $table  ->dropForeign("course_student_student_id_foreign");
            $table  ->dropForeign("course_student_course_id_foreign");
        });
        Schema::dropIfExists('course_student');
    }
}
