<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('attributions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('horaire');
            $table->bigInteger('id_clients')->unsigned();
            $table->bigInteger('id_ordinateurs')->unsigned();
            $table->foreign('id_clients')->references('id')->on('clients');
            $table->foreign('id_ordinateurs')->references('id')->on('ordinateurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('attributions');
        Schema::enableForeignKeyConstraints();
    }
}
