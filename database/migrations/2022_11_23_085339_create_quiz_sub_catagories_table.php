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
        Schema::create('quiz_sub_catagories', function (Blueprint $table) {
            $table->id("q_sid");
            $table->bigInteger("qid")->reference("id")->on("quiz_catagories");
            $table->text("quiz_sub_catagory_name");
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
        Schema::dropIfExists('quiz_sub_catagories');
    }
};
