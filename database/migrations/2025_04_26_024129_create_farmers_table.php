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
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->string('farmer_photo')->nullable();
            $table->string('fpo_registration_no');
            $table->string('farmer_name');
            $table->string('father_name');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->date('date_of_birth');
            $table->text('address');
            $table->string('pin_code');
            $table->string('state');
            $table->string('district');
            $table->string('block');
            $table->string('aadhar_no')->unique();
            $table->string('mobile_no');
            $table->string('area_type');
            $table->string('associated_fpo')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
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
        Schema::dropIfExists('farmers');
    }
};
