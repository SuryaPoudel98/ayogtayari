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
        Schema::create('quiz_enrolls', function (Blueprint $table) {
            $table->id("quiz_enroll_id");
            $table->bigInteger("user_id")->reference("id")->on("users");
            $table->bigInteger("quiz_id")->reference("id")->on("quizzes");
            $table->date("enroll_date");
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
        Schema::dropIfExists('quiz_enrolls');
    }
};
