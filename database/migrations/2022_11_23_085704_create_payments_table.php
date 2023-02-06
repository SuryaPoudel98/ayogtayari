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
        Schema::create('payments', function (Blueprint $table) {
            $table->id("payment_id");
            $table->bigInteger("user_id")->reference("id")->on("users");
            $table->integer("enroll_status")->default(0); // self =0 and 1 =admin enrollment
            $table->float("amounts");
            $table->string("paymentMode");
            $table->string("narration");
            $table->string("tCode");
            $table->integer("cancel")->default(0); //0=paid 1=cancel or returned
            $table->integer("isPaymentCompleted"); //0=complete 1=pending
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
        Schema::dropIfExists('payments');
    }
};
