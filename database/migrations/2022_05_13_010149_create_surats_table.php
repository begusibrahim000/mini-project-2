<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            // $table->foreignId("user_id")->references("id")->on("users")->nullable();
            // $table->foreignId("kategori_surat_id")->references("id")->on("kategori_surats");
            $table->string('kategori')->nullable();
            $table->string('judul')->nullable();
            $table->string('file_surat')->nullable();
            $table->string('keterangan')->nullable();
            $table->enum('status', ['diterima', 'ditolak', 'selesai', 'diproses'])->default('diproses');
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
        Schema::dropIfExists('surats');
    }
}
