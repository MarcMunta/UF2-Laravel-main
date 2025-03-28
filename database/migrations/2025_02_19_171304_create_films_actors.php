<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->year('year');
            $table->string('genre', 50);
            $table->string('country', 30);
            $table->integer('duration');
            $table->string('img_url', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
            Schema::dropIfExists('films');
    }
};