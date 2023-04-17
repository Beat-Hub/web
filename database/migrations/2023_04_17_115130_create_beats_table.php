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
        Schema::create('beats', function (Blueprint $table) {
            $table->id();
            $table->string('beat_name');
            $table->integer('bpm');
            $table->string('genre');
            $table->decimal('price_mp3', 8, 2)->nullable();;
            $table->decimal('price_wav', 8, 2)->nullable();
            $table->string('mp3_file')->nullable();;
            $table->string('wav_file')->nullable();;
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
        Schema::dropIfExists('beats');
    }
};
