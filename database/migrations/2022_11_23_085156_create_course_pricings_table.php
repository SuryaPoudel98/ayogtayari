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
        Schema::create('course_pricings', function (Blueprint $table) {
            $table->id("course_pricing_id");
            $table->bigInteger("course_id")->reference("id")->on("course");
            $table->bigInteger("no_of_days");
            $table->double("normal_price");
            $table->double("sell_price");
            $table->date("sell_exipiry_date");
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
        Schema::dropIfExists('course_pricings');
    }
};
