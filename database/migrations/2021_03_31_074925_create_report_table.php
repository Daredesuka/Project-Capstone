<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->id();
            $table->date('date_report');
            $table->string('name');
            $table->string('status_karyawan');
            $table->string('departemen');
            $table->string('kategori_bahaya');
            $table->text('contents_of_the_report');
            $table->string('lokasi_kejadian');
            $table->string('photo');
            $table->enum('status', ['0', 'process', 'finished']);
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
        Schema::dropIfExists('report');
    }
}