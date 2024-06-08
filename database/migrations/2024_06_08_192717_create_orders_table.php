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
            $table->id('orderID');
            $table->foreignId('productID')->nullable()->constrained('products');
            $table->foreignId('customerID')->nullable()->constrained('customers');
            $table->string('destination', 80)->nullable();
            $table->enum('deliveryStatus', ['Pending', 'Delivered'])->default('Pending');
            $table->enum('paymentStatus', ['Pending', 'Paid'])->default('Pending');
            $table->string('orderAmount', 80)->nullable();
            $table->timestamp('orderDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
            $table->softDeletes();
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
