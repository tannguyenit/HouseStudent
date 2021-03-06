<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->longText('description');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('status_id');
            $table->integer('price');
            $table->float('area');
            $table->integer('pin')->default(0);
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('floor_number')->nullable();
            $table->string('phone_boss', 30);
            $table->string('name_boss', 200);
            $table->string('address', 255);
            $table->string('township', 200);
            $table->string('country', 200);
            $table->string('lat', 200);
            $table->string('lng', 200);
            $table->text('note')->nullable();
            $table->integer('total_view')->default(0);
            $table->integer('active')->default(0);
            $table->integer('total_like')->default(0);
            $table->integer('total_comment')->default(0);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
