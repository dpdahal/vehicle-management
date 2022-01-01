<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->date('start_from');
            $table->date('ends_at');
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('image')->nullable();
            $table->enum('trip_mode', ['one_way', 'round'])->default('one_way');
            $table->unsignedBigInteger('trip_cost')->unsigned();
            $table->foreign('trip_cost')->references('id')
                ->on('destination_rates')->onDelete('restrict')
                ->onUpdate('cascade');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('trip_pages');
    }
}
