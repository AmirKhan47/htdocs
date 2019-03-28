<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('designation');
            $table->string('email')->unique();
            $table->string('type');
            $table->string('contact');
            $table->string('address');
            $table->string('checkup_commission');
            $table->integer('fee');
            $table->string('category');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('doctors');
    }
}
