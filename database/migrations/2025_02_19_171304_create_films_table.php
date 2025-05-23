<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('year');
            $table->string('genre');
            $table->string('country');
            $table->integer('duration');
            $table->string('img_url');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('films');
    }
};