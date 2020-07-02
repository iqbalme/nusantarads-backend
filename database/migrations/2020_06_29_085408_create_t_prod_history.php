<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTProdHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //table untuk statistik penjualan dan view
        Schema::create('t_prod_history', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('marketplace_id')->unsigned();
            $table->foreign('marketplace_id')->references('id')->on('t_marketplace')->cascade('delete');
            $table->string('product_id');
            $table->string('prod_url');
            $table->integer('view')->comment('statistik berapa kali dilihat');
            $table->integer('sold')->comment('statistik berapa terjual');
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('t_prod_history');
    }
}
