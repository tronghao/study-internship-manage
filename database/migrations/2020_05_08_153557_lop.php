<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop', function (Blueprint $table) {
            $table->string('maLop')->unique();
            $table->string('tenLop');
            $table->string('maNganh');
            $table->foreign('maNganh')->references('maNganh')->on('nganh')->onDelete('cascade');
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
        Schema::dropIfExists('lop');
    }
}
