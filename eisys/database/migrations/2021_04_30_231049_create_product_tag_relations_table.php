<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTagRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tag_relations', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned();
            // $table->foreign('product_id')->references('id')->on('product')->cascadeOnDelete();
            $table->integer('tag_id')->unsigned();
            // $table->foreign('tag_id')->references('id')->on('tag')->cascadeOnDelete();
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
        Schema::dropIfExists('product_tag_relations');
    }
}