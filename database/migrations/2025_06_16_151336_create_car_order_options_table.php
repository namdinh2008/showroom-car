<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_order_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_order_id')->constrained()->onDelete('cascade');
            $table->foreignId('configuration_option_id')->constrained('car_configuration_options')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_order_options');
    }
};
