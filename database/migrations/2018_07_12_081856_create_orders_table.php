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
            $table->uuid('uuid');
            $table->primary('uuid');
            $table->string('email');
            $table->string('search_criterias');
            $table->double('total_price')->default(0.00);
            $table->string('delivery_type');
            $table->timestamp('order_date');
            $table->boolean('order_fullfiled')->default(false);
            $table->timestamp('fullfill_date')->nullable();
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
