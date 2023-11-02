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
            $table->string('Name');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('Class_Type', ['Online', 'Clinic', 'Home']);
            $table->time('Class_Schedule');
            $table->decimal('Cost', 10, 2);
            $table->string('Description');
            $table->enum('Duration_Type', ['Monthly', 'Daily', 'Yearly']);
            $table->timestamps();
            $table->softDeletes();
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
            $table->dropForeign(['service_id']);
            $table->dropForeign(['staff_id']);
        });
        Schema::dropIfExists('offers');
    }
};
