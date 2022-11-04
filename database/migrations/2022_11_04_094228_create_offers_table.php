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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('offer_image')->nullable();
            $table->string('offer_title')->nullable();
            $table->string('offer_discount')->nullable();
            $table->string('offer_description')->nullable();
            $table->string('offer_publish_date')->nullable();
            $table->string('offer_expiry_date')->nullable();
            $table->string('offer_category')->nullable();
            $table->string('offer_status')->default(1);
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
        Schema::dropIfExists('offers');
    }
};
