<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequestsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests_data', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('number')->default(' ');
            $table->string('create_data')->default('');
            $table->string('update_data')->default('');
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('priority')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->string('address')->default('');
            $table->mediumText('problem_description');
            $table->string('applicant')->default('');
            $table->string('defect_type')->default('');
            $table->tinyInteger('paid')->default(0);
            $table->tinyInteger('payment_status')->default(0);
            $table->string('executor')->default('');
            $table->string('desired_time')->default('');
            $table->tinyInteger('request_accepted')->default(0);
            $table->string('performed_work_type')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
