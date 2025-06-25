<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('car_variant_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_variant_id');
            $table->string('option_name');
            $table->string('option_value')->nullable();
            $table->decimal('price', 12, 2)->default(0);
            $table->timestamps();

            $table->foreign('car_variant_id')->references('id')->on('car_variants')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_variant_options');
    }
};
