<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recycle_from_homes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama');
            $table->bigInteger('vendor_id')->unsigned();
            $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('alamat')->nullable();
            $table->string('jenisRecycle');
            $table->string('jenisSampah');
            $table->integer('berat');
            $table->date('tanggal');
            $table->text('deskripsi');
            $table->string('file');
            $table->enum('status', ['Processing', 'Approved']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recycle_from_homes');
    }
};
