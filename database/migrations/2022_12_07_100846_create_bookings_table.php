<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('salon_id')->nullable();
            $table->longText('service')->nullable();
            $table->longText('offers')->nullable();
            $table->longText('packages')->nullable();
            $table->string('status')->default(0);
            $table->string('payment_type')->nullable();
            $table->string('payment_status')->nullable();
            $table->longText('customer_address')->nullable();
            $table->string('total_price')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
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
        Schema::dropIfExists('bookings');
    }
};
