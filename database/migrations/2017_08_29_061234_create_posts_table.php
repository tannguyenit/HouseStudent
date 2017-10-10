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
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('user_id', 36);
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->longText('description');
            $table->uuid('type_id', 36);
            $table->uuid('status_id', 36);
            $table->integer('price', 36);
            $table->string('area', 36);
            $table->string('phone_boss', 30);
            $table->string('name_boss', 200);
            $table->string('address', 255);
            $table->string('township', 200);
            $table->string('country', 200);
            $table->string('lat', 200);
            $table->string('lng', 200);
            $table->text('note')->nullable();
            $table->string('total_view', 50)->default(0);
            $table->integer('active')->default(0);
            $table->string('total_like', 50)->default(0);
            $table->string('total_comment', 50)->default(0);
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
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
