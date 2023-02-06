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
        Schema::create('quiz_pricings', function (Blueprint $table) {
            $table->id("quiz_pricing_id");
            $table->bigInteger("quiz_id")->reference("id")->on("quizzes");
            $table->bigInteger("no_of_days");
            $table->bigInteger("normal_price");
            $table->bigInteger("sell_price");
            $table->date("sell_exipiry");
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
        Schema::dropIfExists('quiz_pricings');
    }
};
