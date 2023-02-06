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
        Schema::create('course_enrolls', function (Blueprint $table) {
            $table->bigInteger("course_or_quiz_id");
            $table->bigInteger("pricing_id");
            $table->float("amount");
            $table->integer("type"); //0=course and 1=quiz
            $table->date("startDate");
            $table->date("endDate");
            $table->string("tCode");
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
        Schema::dropIfExists('course_enrolls');
    }
};
