<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_mcqs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("course_id")->reference("id")->on("course");
            $table->string("display_name");
            $table->string("lesson");
            $table->string("sub_lesson");
            $table->string("child_lesson");
            $table->bigInteger("quiz_id")->reference('id')->on("quizzes");
            $table->string("lesson_preview")->default("yes/no");
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
        Schema::dropIfExists('course_mcqs');
    }
};
