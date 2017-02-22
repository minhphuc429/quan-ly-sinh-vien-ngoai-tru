<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNgoaiTrusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ngoai_trus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MaSV')->unique();
            $table->string('HTChuNha');
            $table->string('DTChuNha');
            $table->string('SoNha');
            $table->string('Duong');
            $table->string('ToDanPho');
            $table->string('Phuong');
            $table->string('QuanHe');
            $table->string('HTToTruong');
            $table->string('DTToTruong');

            $table->timestamps();

            $table->foreign('MaSV')->references('MaSV')->on('sinh_viens')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ngoai_trus');
    }
}
