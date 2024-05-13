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
        Schema::create('ulasan_edukasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_id');
            $table->foreignId('user_id')->nullable();
            $table->string('author')->nullable();
            $table->string('isi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::drop('ulasan_edukasis');
    }
};
