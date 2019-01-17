<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('location');
            $table->date('start_date');
            $table->date('end_date');
            $table->float('total_budget',10,6);
            $table->float('est_budget',10,6);
            $table->float('bid_amount',10,6);
            $table->double('physical_progress',8,2);
            $table->float('financial_progress',10,6);
            $table->integer('contractor_id')->unsigned()->index();
            $table->foreign('contractor_id')->references('id')->on('contractors');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('activities');
    }
}
