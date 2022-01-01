<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripPageGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_page_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('image_name');
            $table->unsignedBigInteger('trip_page_id')->unsigned();
            $table->foreign('trip_page_id')->references('id')
                ->on('trip_pages')->onDelete('restrict')
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
        Schema::dropIfExists('trip_page_galleries');
    }
}
