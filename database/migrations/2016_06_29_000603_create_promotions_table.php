<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('coupon_id');
            $table->string('label', 150);
            $table->string('merchant', 150);
            $table->string('coupon_code', 20);
            $table->string('logo_url', 100);
            $table->dateTime('promo_start_dt');
            $table->dateTime('promo_end_dt');
            $table->dateTime('last_refresh');
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
        Schema::drop('promotions');
    }
}
