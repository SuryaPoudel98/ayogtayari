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
        Schema::create('course_newsor_articles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("course_id")->reference("id")->on("course");
            $table->bigInteger("blog_id");
            $table->tinyInteger("enableornot")->default(0);
            $table->string("display_name");
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
        Schema::dropIfExists('course_newsor_articles');
    }
};
