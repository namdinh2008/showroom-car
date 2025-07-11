<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('car_variant_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_variant_id')->constrained()->onDelete('cascade');
            $table->string('image_url');
            $table->boolean('is_main')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_variant_images');
    }
};