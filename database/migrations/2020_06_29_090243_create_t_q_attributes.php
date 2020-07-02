<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTQAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_q_attributes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('marketplace_id')->unsigned();
            $table->foreign('marketplace_id')->references('id')->on('t_marketplace')->cascade('delete');
            $table->bigInteger('attribut_id')->unsigned();
            $table->foreign('attribut_id')->references('id')->on('t_attribut')->cascade('delete');
            $table->string('attribute_query');
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
        Schema::dropIfExists('t_q_attributes');
    }
}
