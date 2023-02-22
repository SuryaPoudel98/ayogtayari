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
        Schema::create('bookmarkcourses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("course_or_quiz_id");
            $table->bigInteger("user_id");
            $table->integer("type"); //0=course 1=quiz
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
        Schema::dropIfExists('bookmarkcourses');
    }
};
