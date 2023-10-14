<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatif', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->unique();
            $table->string('image')->nullable();
            $table->string('code_curug');
            $table->string('name_curug');
            $table->text('description')->nullable();
            $table->string('waktu_awal')->nullable();
            $table->string('waktu_akhir')->nullable();
            $table->string('nohp')->nullable();
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
        Schema::dropIfExists('alternatif');
    }
}
