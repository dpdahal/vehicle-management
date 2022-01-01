<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('city_name')->unique();
            $table->string('city_slug')->unique();
            $table->date('date')->default(Carbon::now());
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->boolean('status')->default(0);
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_footer')->default(0);
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
        Schema::dropIfExists('cities');
    }
}
