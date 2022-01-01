<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->date('date')->nullable();;
            $table->boolean('status')->default(0);
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('page_visit')->default(1);
            $table->unsignedBigInteger('posted_by')->unsigned();
            $table->foreign('posted_by')->references('id')
                ->on('admins')->onDelete('restrict')
                ->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('blog_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('blogs_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->text('body');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('blog_comments');
    }
}
