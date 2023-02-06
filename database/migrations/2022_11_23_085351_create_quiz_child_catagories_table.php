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
        Schema::create('quiz_child_catagories', function (Blueprint $table) {
            $table->id("quiz_child_catagory_id");
            $table->bigInteger("q_sid")->reference("id")->on("quiz_sub_catagories");
            $table->text("quiz_child_catagory_name");
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
        Schema::dropIfExists('quiz_child_catagories');
    }
};
