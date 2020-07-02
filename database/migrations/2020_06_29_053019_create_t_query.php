<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTQuery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_query', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('marketplace_id')->unsigned();
            $table->foreign('marketplace_id')->references('id')->on('t_marketplace')->cascade('delete');
            $table->string('api_host');
            $table->string('query');
            $table->enum('method', ['GET', 'POST', 'PATCH', 'PUT', 'DELETE'])->default('GET');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('t_query');
    }
}
