<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_bills', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->unsignedBigInteger('operation_id');
            $table->foreign('operation_id')->references('id')->on('operations')->onDelete('cascade');
            $table->integer('room_medicine');
            $table->integer('ot_medicine');
            $table->integer('ot_fee');
            $table->integer('doctor_fee');
            $table->integer('room_fee');
            $table->integer('room_days');
            $table->integer('operation_fee');
            $table->integer('sub_total');
            $table->integer('welfare');
            $table->integer('discount');
            $table->integer('total');
            $table->integer('final_total');
            $table->integer('advance');
            $table->integer('balance');
            $table->integer('paid');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('operation_bills');
    }
}
