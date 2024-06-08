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
        Schema::create('products', function (Blueprint $table) {
            $table->id('productID');
            $table->string('productName', 80)->nullable();
            $table->foreignId('categoryID')->nullable()->constrained('categories');
            $table->integer('price')->nullable();
            $table->integer('stockAmount')->nullable();
            $table->foreignId('vendorID')->nullable()->constrained('customers');
            $table->string('productDescription', 255)->nullable();
            $table->string('imageUrl', 80)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
