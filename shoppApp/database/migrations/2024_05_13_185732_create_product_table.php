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
        if (Schema::hasTable('products')) {
            return;
        }
        else{
        Schema::create('products', function (Blueprint $table) {
            $table->id('productID');
            $table->string('productName');
            $table->unsignedBigInteger('categoryID');
            $table->decimal('price', 8, 2);
            $table->integer('stockAmount');
            $table->unsignedBigInteger('vendorID')->nullable();
            $table->text('productDescription')->nullable();
            $table->timestamps();

            $table->foreign('categoryID')->references('categoryID')->on('categories')->onDelete('cascade');
            $table->foreign('vendorID')->references('customerID')->on('vendors')->onDelete('set null');

        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
