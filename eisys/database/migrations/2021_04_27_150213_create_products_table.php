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
            $table->string('name');
            $table->integer('category_id')->unsigned();
            // $table->foreign('category_id')->references('id')->on('category')->cascadeOnDelete();
            $table->integer('brand_id')->unsigned();
            // $table->foreign('brand_id')->references('id')->on('brand')->cascadeOnDelete();
            $table->integer('price')->default(0);
            $table->integer('quantity')->default(0)->comment('数量');
            $table->string('image_path1')->nullable()->comment('画像パス');
            $table->string('image_title1')->nullable()->comment('画像名');
            $table->string('image_path2')->nullable();
            $table->string('image_title2')->nullable();
            $table->string('image_path3')->nullable();
            $table->string('image_title3')->nullable();
            $table->string('image_path4')->nullable();
            $table->string('image_title4')->nullable();
            $table->string('image_path5')->nullable();
            $table->string('image_title5')->nullable();
            $table->string('description')->nullable()->comment('商品説明');
            $table->softDeletes();
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
