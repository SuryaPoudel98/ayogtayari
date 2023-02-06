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
        Schema::create('course_notes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("course_id")->reference("id")->on("course");
            $table->string("display_name");
            $table->string("lesson");
            $table->string("sub_lesson")->nullable();
            $table->string("child_lesson")->nullable();
            $table->text("file")->nullable();
            $table->text("url")->nullable();
            $table->bigInteger("downloadornot");
            $table->bigInteger("lesson_preview");
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
        Schema::dropIfExists('course_notes');
    }
};
