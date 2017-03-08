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
            $table->string('HTChuNha')->nullable()->default('');
            $table->string('SoNha')->nullable()->default('');
            $table->string('Duong')->nullable()->default('');
            $table->string('ToDanPho')->nullable()->default('');
            $table->string('Phuong')->nullable()->default('');
            $table->string('QuanHe')->nullable()->default('');
            $table->string('DTChuNha')->nullable()->default('');
            $table->string('HTToTruong')->nullable()->default('');
            $table->string('DTToTruong')->nullable()->default('');

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
