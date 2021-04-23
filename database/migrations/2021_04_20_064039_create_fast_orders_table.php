<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFastOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('users', function (Blueprint $table) {
//            $table->id();

//            $table->timestamps();
//            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
//        });
        Schema::create('fast_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phonenumber');
            $table->text('address');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('link');
            $table->text('note');
            $table->string('customer_phone');
            $table->timestamps();
            $table->foreign('customer_phone')->references('phonenumber')->on('fast_orders')->onDelete('cascade');
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
        Schema::dropIfExists('fast_orders');

    }
}
