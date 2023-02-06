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
        Schema::create('quiz_questions_banks', function (Blueprint $table) {
            $table->id("quiz_question_bank_id");
            $table->bigInteger("question_bank_id")->reference("id")->on("questions_bank");
            $table->bigInteger("question_id");
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
        Schema::dropIfExists('quiz_questions_banks');
    }
};
