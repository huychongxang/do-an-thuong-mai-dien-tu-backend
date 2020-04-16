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
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->integer('subtotal')->nullable()->default(0)->comment('Số tiền mua hàng');
            $table->integer('shipping')->nullable()->default(0)->comment('Tiền ship');
            $table->integer('discount')->nullable()->default(0)->comment('Tiền được trừ giảm giá');
            $table->bigInteger('payment_status')->default(1);
            $table->integer('shipping_status')->default(1);
            $table->integer('status')->default(0);
            $table->integer('tax')->nullable()->default(0)->comment('Thuế');
            $table->integer('total')->nullable()->default(0)->comment('Tổng tiền cần thanh toán');
            $table->integer('received')->nullable()->default(0)->comment('Tiền đã ứng trước');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('address1', 100);
            $table->string('address2', 100);
            $table->string('phone', 20);
            $table->string('email', 150);
            $table->string('comment', 300)->nullable();
            $table->string('payment_method', 100)->nullable();
            $table->string('shipping_method', 100)->nullable();
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
