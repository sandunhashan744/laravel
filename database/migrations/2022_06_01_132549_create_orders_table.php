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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->String('uid');
            $table->String('name');
            $table->String('phone');
            $table->String('email');
            $table->String('address1');
            $table->String('address2');
            $table->String('town');
            $table->String('district');
            $table->String('zipcode');
            $table->tinyInteger('status')->default('0');
            $table->String('tracking_no');
            $table->String('totPrice');
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
        Schema::dropIfExists('orders');
    }
};
