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
            $table->string('HoTen');
            $table->string('MaSV')->unique();
            $table->string('MaLop');
            $table->boolean('GioiTinh')->nullable();
            $table->date('NgaySinh')->nullable();
            $table->string('DiaChi')->nullable();
            $table->string('DienThoai')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();

            $table->index('MaLop');

            $table->foreign('MaLop')->references('MaLop')->on('lops')
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
        Schema::dropIfExists('sinh_viens');
    }
}
