<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('code')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('customer_name')->nullable();
            $table->text('email')->nullable();
            $table->integer('mobile')->nullable();
            $table->text('address')->nullable();
            $table->integer('payment')->nullable();
            $table->text('note')->nullable();
            $table->integer('status')->nullable();
            $table->time('receive_at')->nullable();
            $table->mediumInteger('total')->nullable();
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
