<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTProductDrafts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_product_drafts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unique()->unsigned();
            $table->foreign('customer_id')->references('id')->on('t_customers')->cascade('delete');
            $table->bigInteger('marketplace_id_source')->unsigned();
            $table->foreign('marketplace_id_source')->references('id')->on('t_marketplace')->cascade('delete');
            $table->string('product_id');
            $table->string('customer_prod_url');
            $table->longText('changed_attributes')->comment('berisi json tentang apa saja yang telah diubah untuk diposting oleh customer');
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
        Schema::dropIfExists('t_product_drafts');
    }
}
