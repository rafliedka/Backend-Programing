<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        # membuat table pasien
        Schema::create('pasiens', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->text('address');
            $table->string('status');
            $table->date('in_date_at');
            $table->date('out_date_at')->nullable();
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
        Schema::dropIfExists('pasiens');
    }
}
