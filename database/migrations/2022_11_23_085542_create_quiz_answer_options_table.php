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
        Schema::create('quiz_answer_options', function (Blueprint $table) {
            $table->id("quiz_answer_option_id");
            $table->bigInteger("question_id")->reference("id")->on("quiz_questions");
            $table->text("answer");
            $table->tinyInteger("correctornot")->default(0);
            $table->string("answer_option");
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
        Schema::dropIfExists('quiz_answer_options');
    }
};
