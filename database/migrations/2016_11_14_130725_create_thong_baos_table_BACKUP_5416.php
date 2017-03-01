<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThongBaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thong_baos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
<<<<<<< HEAD
            $table->string('slug');
            $table->string('description');
            $table->string('content');

            $table->timestamps();

=======
            $table->longText('description');
            $table->longText('noidung');

            $table->timestamps();
            $table->softDeletes();
>>>>>>> new
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thong_baos');
    }
}
