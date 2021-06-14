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
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('chef_id');
            $table->string('charge_id')->nullable();
            $table->boolean('status');
            $table->string('billing_address1');
            $table->string('billing_address2')->nullable();
            $table->string('billing_city');
            $table->string('billing_postcode');
            $table->string('note')->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->string('name');
            $table->string('billing_total');
            $table->integer('quantity');
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
