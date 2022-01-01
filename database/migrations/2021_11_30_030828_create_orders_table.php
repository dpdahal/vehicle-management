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
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')
            ->on('users')->onDelete('restrict')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')
            ->on('vehicles')->onDelete('restrict')
            ->onUpdate('cascade');
            $table->string('ordered_date');
            $table->string('last_updated');
            $table->string('notes');
            $table->unsignedBigInteger('trip_id')->unsigned();
            $table->foreign('trip_id')->references('id')
            ->on('trip_pages')->onDelete('restrict')
            ->onUpdate('cascade');
            $table->enum('status', ['complete', 'pending', 'booked', 'not_confirmed', 'cancel'])->default('pending');
            $table->enum('payment_status', ['pending', 'partial', 'completed'])->default('pending');
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
