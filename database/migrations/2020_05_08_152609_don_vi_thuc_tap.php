<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DonViThucTap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donvithuctap', function (Blueprint $table) {
            $table->string('maDonVi')->unique();
            $table->string('tenDonVi');
            $table->string('diaChiDonVi');
            $table->string('sdtDonVi');
            $table->float('soKM');
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
        Schema::dropIfExists('donvithuctap');
    }
}
