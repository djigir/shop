<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->integer('category')->nullable();
            $table->integer('sub_category')->nullable();
            $table->integer('article')->nullable();
            $table->string('title')->nullable();
            $table->integer('price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->integer('provider_price')->nullable();
            $table->integer('availability')->nullable();
            $table->longText('description')->nullable();
            $table->string('img')->nullable();
            $table->string('img_2')->nullable();
            $table->string('img_3')->nullable();
            $table->string('img_4')->nullable();
            $table->string('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('textile')->nullable();
            $table->string('model_growth')->nullable();
            $table->string('season')->nullable();
            $table->string('production')->nullable();
            $table->string('length')->nullable();
            $table->string('sleeve_length')->nullable();
            $table->string('add_info')->nullable();
            /*id */
            $table->string('accessories')->nullable();
            $table->string('print')->nullable();
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
}
