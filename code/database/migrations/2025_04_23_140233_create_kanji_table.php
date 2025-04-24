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
        Schema::create('kanji', function (Blueprint $table) {
            $table->id();
            $table->string('kanji_character');
            $table->text('meaning');
            $table->text('reading_on');
            $table->text('reading_kon');
            $table->integer('jlpt_level');
            $table->text('exemples');
            $table->integer('radical');
            $table->integer('grade');
            $table->text('memory_trick');
            $table->text('stroke_order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kanji');
    }
};
