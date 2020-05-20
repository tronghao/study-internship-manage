<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChamDiem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamdiem', function (Blueprint $table) {
            $table->string('idSinhVien');
            $table->string('idNguoiCham');
            $table->string('maPhieuCham');
            $table->date('ngayKetThucThucTap');
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
        Schema::dropIfExists('chamdiem');
    }
}
