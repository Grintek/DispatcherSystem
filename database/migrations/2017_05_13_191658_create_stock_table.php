<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('stock', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name')->default(' ');
            $table->string('color_definition')->default(' ');
            $table->string('measure')->default(' ');
            $table->string('comment')->default(' ');
            $table->integer('amount_left')->default(0);
            $table->string('last_supply')->default('');
            $table->string('last_write_off')->default('');
            $table->integer('new_supply_limit')->default(0);
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
