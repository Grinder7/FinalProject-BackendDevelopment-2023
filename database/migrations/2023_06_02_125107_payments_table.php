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
        Schema::create('payments', function (Blueprint $table) {
            $table->ulid('id')->unique();
            $table->foreignUlid('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->nullable();
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('zip');
            $table->boolean('remember_detail')->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_details');
    }
};
