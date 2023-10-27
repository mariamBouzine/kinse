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
            $table->unsignedBigInteger('Offer_id');
            $table->foreign('Offer_id')->references('id')->on('offers')->onDelete('cascade')->onUpdate('cascade');
            $table->date('Appointment_Date');
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
        Schema::table('offers',function(Blueprint $table){
            $table->dropForeign(['Offer_id']);
        });
        Schema::dropIfExists('appointments');
    }
};
