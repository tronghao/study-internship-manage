<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PhieuCham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieucham', function (Blueprint $table) {
            $table->string('maPhieuCham', '10')->primary();
            $table->float('diem');
            $table->date('ngayCham');
            $table->text('nhanXet');
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
        Schema::dropIfExists('phieucham');
    }
}
