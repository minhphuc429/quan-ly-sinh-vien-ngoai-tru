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
            $table->string('IDSV');
            $table->string('HTChuNha')->nullable();
            $table->string('DTChuNha')->nullable();
            $table->string('SoNha')->nullable();
            $table->string('Duong')->nullable();
            $table->string('ToDanPho')->nullable();
            $table->string('Phuong')->nullable();
            $table->string('QuanHe')->nullable();
            $table->string('HTToTruong')->nullable();
            $table->string('DTToTruong')->nullable();

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
        Schema::dropIfExists('ngoai_trus');
    }
}
