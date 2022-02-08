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
            $table->string('order_person_name');
            $table->string('orderlist_name');
            $table->integer('orderlist_count');
            $table->integer('orderlist_total');
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
