<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ThucTap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuctap', function (Blueprint $table) {
            $table->string('emailSV')->unique();
           
            $table->date('ngayBatDauThucTap')->nullable();
            $table->string('emailGV')->nullable();
            $table->string('emailNHD')->nullable();
            $table->string('maDonVi')->nullable();
            $table->foreign('emailGV')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('emailNHD')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('maDonVi')->references('maDonVi')->on('donvithuctap')->onDelete('cascade');
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
        Schema::dropIfExists('thuctap');
    }
}
