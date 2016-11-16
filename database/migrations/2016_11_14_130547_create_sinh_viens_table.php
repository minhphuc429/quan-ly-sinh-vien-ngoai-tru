<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinhViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinh_viens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TenSv');
            $table->string('IDSV')->unique();
            $table->boolean('GioiTinh');
            $table->date('NgaySinh');
            /*$table->string('DanToc')->nullable();*/
            $table->string('DiaChi');
            /*$table->string('CMND');
            $table->date('NgayCap')->nullable();
            $table->string('NoiCap')->nullable();
            $table->string('Khoa');
            $table->string('Nganh');
            $table->string('Bac');*/
            $table->string('Lop');
            $table->string('DienThoai')->nullable()->unique();
            $table->string('Email')->nullable()->unique();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinh_viens');
    }
}
