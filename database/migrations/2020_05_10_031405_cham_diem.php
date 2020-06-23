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
            $table->string('emailSV', '100');
            $table->string('emailNguoiCham', '100');
            $table->string('maPhieuCham', '10');
            $table->date('ngayKetThucThucTap');
            $table->primary(['emailSV', 'emailNguoiCham', 'maPhieuCham']);
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
