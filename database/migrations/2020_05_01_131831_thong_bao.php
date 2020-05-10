<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ThongBao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thong-bao', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img');
            $table->string('title');
            $table->text('content');
            $table->text('quote');
            $table->bigInteger('idAdmin');
            $table->foreign('idAdmin')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thong-bao');
    }
}
