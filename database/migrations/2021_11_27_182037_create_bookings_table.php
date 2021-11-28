<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('id_buyers', 50);
            $table->foreign("id_buyers")->references('id')->on('buyers')->onDelete("no action")
                ->onUpdate("no action");
            $table->string('id_events', 50);
            $table->foreign("id_events")->references('id')->on('events')->onDelete("no action")
                ->onUpdate("no action");
            $table->integer('tickets');
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
        Schema::dropIfExists('bookings');
    }
}
