<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->double('current_high')->nullable();
            $table->double('current_low')->nullable();
            $table->double('voltage_high')->nullable();
            $table->double('voltage_low')->nullable();
            $table->double('power_high')->nullable();
            $table->double('power_low')->nullable();
            $table->double('unit')->nullable();
            $table->string('data')->nullable();
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
        Schema::dropIfExists('consumptions');
    }
}
