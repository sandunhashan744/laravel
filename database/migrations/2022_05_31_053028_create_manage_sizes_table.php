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
        Schema::create('manage_sizes', function (Blueprint $table) {
            $table->id();
            $table->String('pro_id')->nullable();
            $table->String('cat_id');
            $table->String('subCat_id');
            $table->String('size_lbl');
            $table->String('chest')->nullable();
            $table->String('sholder')->nullable();
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
        Schema::dropIfExists('manage_sizes');
    }
};
