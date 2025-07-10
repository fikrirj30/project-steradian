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
            $table->id();
            $table->integer('car_id');
            $table->foreign('car_id')
                ->references('id')
                ->on('cars')
                ->onDelete('set null');

            $table->date('order_date');
            $table->date('pickup_date');
            $table->date('dropoff_date');
            $table->string('pickup_location');
            $table->string('dropoff_location');
 
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
