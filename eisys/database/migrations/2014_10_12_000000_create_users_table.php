<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('sex')->comment('1:man / 2:female');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('points')->default(0);
            $table->string('phone')->nullable();
            $table->string('address1')->nullable()->comment('住所');
            $table->string('address2')->nullable()->comment('マンション番号etc...');
            $table->string('zip_code')->nullable()->comment('住所番号');
            $table->string('state')->nullable()->comment('都道府県');
            $table->string('city')->nullable()->comment('市');
            $table->string('country')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
