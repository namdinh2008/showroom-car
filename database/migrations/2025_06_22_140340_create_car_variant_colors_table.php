<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('car_variant_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_variant_id')->constrained()->onDelete('cascade');
            $table->string('color_name');
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_variant_colors');
    }
};