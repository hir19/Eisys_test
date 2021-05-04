<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('user')->cascadeOnDelete();
            $table->integer('product_id')->unsigned();
            // $table->foreign('product_id')->references('id')->on('product')->cascadeOnDelete();
            $table->integer('star')->default(1);
            $table->string('comment')->nullable();
            $table->timestamps();
            $table->index(['product_id', 'user_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
