<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderlists', function (Blueprint $table) {
            $table->smallIncrements('orderlist_id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('order_id')
            ->on('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->string('family_name');
            $table->string('product_name');
            $table->integer('product_count');
            $table->integer('product_price');
            $table->integer('orderlist_log')->nullable();
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
        Schema::dropIfExists('orderlists');
    }
}
