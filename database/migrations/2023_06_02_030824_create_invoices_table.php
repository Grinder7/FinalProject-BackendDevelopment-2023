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
        Schema::create('invoices', function (Blueprint $table) {
            $table->ulid('invoiceId');
            $table->string('user_username');
            $table->unsignedBigInteger('stock_id');
            $table->unsignedInteger('amount');
            $table->foreign('stock_id')->references('id')->on('stocks');
            $table->foreign('user_username')->references('username')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
