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
        Schema::create('quizsolutions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("quiz_id");
            $table->bigInteger("question_id");
            $table->bigInteger("user_id");
            $table->bigInteger("quiz_answer_option_id");
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
        Schema::dropIfExists('quizsolutions');
    }
};
