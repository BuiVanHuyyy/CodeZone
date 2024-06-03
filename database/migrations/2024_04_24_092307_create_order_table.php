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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->double('total_price', 10, 1);
            $table->enum('status', ['paid', 'pending', 'failed'])->default('pending');
            $table->enum('payment_method', ['VNBANK', 'INTCARD'])->default('VNBANK');
            $table->softDeletes();
            $table->timestamps();

            $table->foreignUuid('user_id')->constrained('users');
            $table->index(['status', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
