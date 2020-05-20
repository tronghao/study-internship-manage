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
            $table->string('idSinhVien');
            $table->string('idGiangVien');
            $table->string('idNguoiHuongDan');
            $table->string('maDonVi');
            $table->bigInteger('idKinhPhi');
            $table->date('ngayBatDauThucTap');
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
