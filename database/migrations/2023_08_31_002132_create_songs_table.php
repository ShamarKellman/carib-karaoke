<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code', 20)->nullable();
            $table->year('release_year')->nullable();
            $table->foreignId('artist_id')->nullable()->constrained();
            $table->foreignId('genre_id')->nullable()->constrained();
            $table->foreignId('brand_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
