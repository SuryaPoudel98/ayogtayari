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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id("quiz_id");
            $table->bigInteger("qid")->reference("id")->on("quiz_catagories");
            $table->bigInteger("q_sid")->reference("id")->on("quiz_sub_catagories");
            $table->bigInteger("quiz_child_catagory_id")->reference("id")->on("quiz_child_catagories");
            $table->text("quiz_price")->default("free");
            $table->text("quiz_title");
            $table->text("thumbnail");
            $table->text("quiz_description");
            $table->tinyInteger("practise_mode")->default(0);
            $table->bigInteger("marks_for_correction");
            $table->float("negative_marks");
            $table->bigInteger("pass_marks");
            $table->tinyInteger("random_question")->default(0);
            $table->tinyInteger("random_option")->default(0);
            $table->bigInteger("no_of_option");
            $table->bigInteger("quiz_time");
            $table->tinyInteger("report_question")->default(0);
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
        Schema::dropIfExists('quizzes');
    }
};
