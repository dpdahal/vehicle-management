<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from')->unsigned();
            $table->unsignedBigInteger('to')->unsigned();
            $table->unsignedBigInteger('vehicle_type')->unsigned();
            $table->integer('cost')->default(0);
            $table->foreign('from')->references('id')
                ->on('cities')->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('to')->references('id')
                ->on('cities')->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('vehicle_type')->references('id')
                ->on('vehicle_types')->onDelete('restrict')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('destination_rates');
    }
}
