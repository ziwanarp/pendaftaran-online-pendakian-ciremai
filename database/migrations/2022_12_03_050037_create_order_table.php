<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('kuota_id');
            $table->string('kode_order')->unique();
            $table->integer('harga');
            $table->string('tanggal_naik');
            $table->string('tanggal_turun');
            $table->enum('status', ['Pending', 'Konfirmasi','Tolak']);
            $table->integer('reschedule')->default(0);
            $table->integer('checkin')->default(0);
            $table->integer('checkout')->default(0);
            $table->timestamp('checkin_time')->nullable();
            $table->timestamp('checkout_time')->nullable();
            $table->integer('jumlah_pendaki');
            $table->string('snapToken')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
