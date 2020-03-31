<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sku')->unique()->index();
            $table->string('name', 200)->nullable();
            $table->string('description', 200)->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->integer('price')->nullable()->default(0);
            $table->integer('cost')->nullable()->default(0);
            $table->integer('sold')->nullable()->default(0);
            $table->integer('stock')->nullable()->default(0);
            $table->tinyInteger('kind')->default(0)->comment('0:single, 1:bundle, 2:group')->index();
            $table->tinyInteger('virtual')->nullable()->default(0)->comment('0:physical, 1:download, 2:only view, 3: Service')->index();
            $table->tinyInteger('status')->default(0)->index();
            $table->tinyInteger('sort')->default(0);
            $table->integer('view')->default(0);
            $table->dateTime('date_lastview')->nullable();
            $table->date('date_available')->nullable();
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
        Schema::dropIfExists('products');
    }
}
