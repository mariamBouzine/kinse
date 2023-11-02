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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); 
            $table->string("Full_Name");
            $table->string("email");
            $table->string("phone");
            $table->unsignedBigInteger('offer_ID');
            $table->foreign('offer_ID')->references('id')->on('offers')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('Patient_ID');
            $table->foreign('Patient_ID')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('Appointment_DateTime');
            $table->string('Payment_Status')->nullable(); 
            $table->enum('Status', ['send in coach', 'Pending'])->default('Pending');
            $table->dateTime('Course_Expiry')->nullable();  
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
        Schema::table('appointments',function(Blueprint $table){
            $table->dropForeign(['offer_ID']);
            $table->dropForeign(['Patient_ID']);
        });
        Schema::dropIfExists('appointments');
    }
};
