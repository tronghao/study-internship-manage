<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NguoiHuongDan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoihuongdan', function (Blueprint $table) {
            $table->string('email', '100')->unique();
            $table->string('maChucVu', '10');
            $table->string('maDonVi', '10');
            $table->foreign('maChucVu')->references('maChucVu')->on('chucvu')->onDelete('cascade');
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
        Schema::dropIfExists('nguoihuongdan');
    }
}
