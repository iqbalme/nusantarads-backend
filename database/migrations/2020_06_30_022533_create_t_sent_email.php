<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSentEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_sent_email', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('newsletter_subj_id')->unsigned();
            $table->foreign('newsletter_subj_id')->references('id')->on('t_newsletter_subj')->cascade('delete');
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
        Schema::dropIfExists('t_sent_email');
    }
}
