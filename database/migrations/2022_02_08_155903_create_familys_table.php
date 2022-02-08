<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familys', function (Blueprint $table) {
            $table->smallIncrements('family_id');
            $table->unsignedBigInteger('custom_id');
            $table->foreign('custom_id')->references('custom_id')->on('customs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('family_name');
            $table->string('family_email')->nullable();
            $table->string('family_tel')->nullable();
            $table->string('family_log')->nullable();
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
        Schema::dropIfExists('familys');
    }
}
