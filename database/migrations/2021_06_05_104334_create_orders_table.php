<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations. (php artisan migrate) ":rollback"
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('order_no')->unique();
            $table->string('product', 150)->nullable();
            $table->string('address', 150)->nullable();
            $table->string('mobile_number', 12)->nullable();
            $table->integer('value'); // value and price
            $table->integer('total');
            $table->integer('status');
            $table->string('shipping_code', 8)->nullable();
            $table->timestamps();
        });
    }

    ### Status
    # 0 -> Unpaid
    # 1 -> Success
    # 2 -> Failed
    # 3 -> Canceled

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
