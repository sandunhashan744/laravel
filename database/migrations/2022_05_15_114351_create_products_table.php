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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('cat');
            $table->string('sub_cat');
            $table->string('name');
            $table->float('price');
            $table->float('dis_price')->nullable();
            $table->string('description');
            $table->Integer('size_S')->nullable();
            $table->Integer('size_M')->nullable();
            $table->Integer('size_L')->nullable();
            $table->Integer('size_XL')->nullable();
            $table->Integer('size_28')->nullable();
            $table->Integer('size_30')->nullable();
            $table->Integer('size_32')->nullable();
            $table->Integer('size_34')->nullable();
            $table->Integer('size_36')->nullable();
            $table->Integer('totProQty')->default(0);
            $table->string('image');
            $table->date('seson_start')->nullable();
            $table->date('seson_end')->nullable();
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
        Schema::dropIfExists('products');
    }
};
