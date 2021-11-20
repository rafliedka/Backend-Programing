<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        #membuat table status pasien
        /* Schema::create('status_pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->timestamps();
        });

        #menambahkan foreign key pada status id
        Schema::table('pasiens', function ($table) {
            $table->foreign('status_id')->references('id')->on('status_pasiens');
        }); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_pasiens');
    }
}
