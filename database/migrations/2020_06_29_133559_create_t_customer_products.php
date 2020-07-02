<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTCustomerProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_customer_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('marketplace_id_source')->unsigned();
            $table->foreign('marketplace_id_source')->references('id')->on('t_marketplace')->cascade('delete');
            $table->string('product_id');
            $table->string('customer_prod_url');
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('t_customers')->cascade('delete');
            $table->bigInteger('marketplace_id_dest')->unsigned();
            $table->foreign('marketplace_id_dest')->references('id')->on('t_marketplace')->cascade('delete');
            $table->longText('changed_attributes')->comment('berisi json tentang apa saja yang telah diubah untuk diposting oleh customer');
            $table->integer('stok')->comment('hanya diparsing ke client untuk membership tertentu');
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
        Schema::dropIfExists('t_customer_products');
    }
}
