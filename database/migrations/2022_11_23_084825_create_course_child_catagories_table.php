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
        Schema::create('course_child_catagories', function (Blueprint $table) {
            $table->id("child_catagory_id");
            $table->bigInteger("s_cid")->refrences("id")->on("course_sub_catagories");
            $table->string("child_catagory_name");
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
        Schema::dropIfExists('course_child_catagories');
    }
};
