<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorization', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('pay_email');
            $table->string('authorization_code');
            $table->string('card_type');
            $table->string('last4');
            $table->string('exp_month');
            $table->string('exp_year');
            $table->string('bin');
            $table->string('bank');
            $table->string('channel');
            $table->string('signature');
            $table->string('reusable');
            $table->string('country_code');
            $table->string('brand');
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
        Schema::dropIfExists('authorization');
    }
}
