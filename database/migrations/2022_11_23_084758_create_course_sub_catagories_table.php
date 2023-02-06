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
        Schema::create('course_sub_catagories', function (Blueprint $table) {
            $table->id("s_cid");
            $table->bigInteger("cid")->refrences("id")->on("course_catagories");
            $table->string("sub_catagory_name");
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
        Schema::dropIfExists('course_sub_catagories');
    }
};
