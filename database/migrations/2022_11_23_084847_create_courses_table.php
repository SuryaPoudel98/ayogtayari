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
        Schema::create('courses', function (Blueprint $table) {
            $table->id("course_id");
            $table->smallInteger("cid")->references("id")->on('course_catagories');
            $table->smallInteger("s_cid")->references("id")->on('course_sub_catagories');
            $table->smallInteger("child_catagory_id")->references("id")->on('course_child_catagories');
            $table->bigInteger("course_price")->default(0/1);
            $table->text("course_title");
            $table->text("thumbnail")->nullable();
            $table->text("course_description");
            $table->bigInteger("course_video_duration")->nullable()->default(0);
            $table->bigInteger("allow_review")->default(0/1);
            $table->bigInteger("discussion_with_teacher")->default(0/1);
            $table->bigInteger("allow_file_attach_for_discussion")->default(0/1);
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
};
