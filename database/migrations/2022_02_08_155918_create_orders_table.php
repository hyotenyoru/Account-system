<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->smallIncrements('order_id');
            $table->unsignedBigInteger('custom_id');
            $table->foreign('custom_id')->references('custom_id')
                ->on('customs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('order_name');
            $table->string('order_log')->nullable();
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
}
