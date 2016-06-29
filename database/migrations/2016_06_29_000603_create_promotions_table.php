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
            $table->string('label', 150)->nullable();
            $table->string('merchant', 150)->nullable();
            $table->string('coupon_code', 20)->nullable();
            $table->string('logo_url', 100)->nullable();
            $table->dateTime('promo_start_dt')->nullable();
            $table->dateTime('promo_end_dt')->nullable();
            $table->dateTime('last_refresh')->nullable();
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
