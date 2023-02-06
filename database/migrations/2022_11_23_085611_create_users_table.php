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
        Schema::create('users', function (Blueprint $table) {
            $table->id("user_id");
            $table->string("fullname");
            $table->bigInteger("contact_number");
            $table->text("email_address");
            $table->string("password");
            $table->string("occupation")->nullable();
            $table->string("companyname")->nullable();
            $table->string("address")->nullable();
            $table->string("city")->nullable();
            $table->string("distric")->nullable();
            $table->integer("postcode")->nullable();
            $table->string("linkedin")->nullable();
            $table->string("facebook")->nullable();
            $table->string("twitter")->nullable();
            $table->string("instagram")->nullable();
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
        Schema::dropIfExists('user');
    }
};
