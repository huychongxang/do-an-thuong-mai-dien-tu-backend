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
            $table->bigIncrements('id');
            $table->bigInteger('admin_id');
            $table->bigInteger('category_id');
            $table->string('title');
            $table->string('slug');
            $table->text('excerpt')->nullable();
            $table->text('body')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->index(['admin_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
