<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table)
        {
            $table->string('username')->unique()->after('email');
            $table->string('contact')->after('password');
            $table->string('address')->after('contact');
            $table->string('cnic')->after('address');
            $table->integer('role')->after('cnic');
            $table->tinyInteger('status')->after('role');
            $table->integer('created_by')->after('status');
            $table->integer('updated_by')->after('created_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
