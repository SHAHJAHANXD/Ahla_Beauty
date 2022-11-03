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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('code')->nullable();
            $table->string('password_code')->nullable();
            $table->string('account_status')->default(1);
            $table->string('email_status')->default(0);
            $table->string('password')->nullable();
            $table->string('role')->nullable();
            $table->string('freelancer_license_number')->nullable();
            $table->string('salon_name_en')->nullable();
            $table->string('salon_name_ar')->nullable();
            $table->string('commercial_registration_number')->nullable();
            $table->string('certificate')->nullable();
            $table->string('category')->nullable();
            $table->string('iban')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('average_orders')->nullable();
            $table->string('service_type')->nullable();
            $table->string('monday')->nullable();
            $table->string('tuesday')->nullable();
            $table->string('wednesday')->nullable();
            $table->string('thursday')->nullable();
            $table->string('friday')->nullable();
            $table->string('saturday')->nullable();
            $table->string('sunday')->nullable();
            $table->string('shift')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
