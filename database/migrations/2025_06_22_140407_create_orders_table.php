<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('phone');
            $table->string('name');
            $table->string('email')->nullable();
            $table->text('address');
            $table->decimal('total_price', 12, 2)->default(0);
            $table->text('note')->nullable();
            $table->enum('payment_method', ['cod', 'bank_transfer', 'vnpay', 'momo'])->default('cod');
            $table->enum('status', ['pending', 'confirmed', 'shipping', 'delivered', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};