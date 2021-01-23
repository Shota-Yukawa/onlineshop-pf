<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('user_id');
          $table->unsignedBigInteger('item_id');
          $table->integer('complete')->default(0);
          $table->unsignedInteger('order_id')->nullable();
          $table->integer('cart_quantity');
          $table->integer('price');
          $table->timestamps();

          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');


          $table->unique(['user_id', 'item_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
