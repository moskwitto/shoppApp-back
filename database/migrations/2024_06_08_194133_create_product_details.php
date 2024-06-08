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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->string('homeImage')->default('https://st2.depositphotos.com/2586633/46477/v/450/depositphotos_464771766-stock-illustration-no-photo-or-blank-image.jpg'); // Define column name directly as a string and set default value
            $table->string('image1')->default('https://st2.depositphotos.com/2586633/46477/v/450/depositphotos_464771766-stock-illustration-no-photo-or-blank-image.jpg'); // Define column name directly as a string and set default value
            $table->string('image2')->default('https://st2.depositphotos.com/2586633/46477/v/450/depositphotos_464771766-stock-illustration-no-photo-or-blank-image.jpg'); // Define column name directly as a string and set default value
            $table->string('image3')->default('https://st2.depositphotos.com/2586633/46477/v/450/depositphotos_464771766-stock-illustration-no-photo-or-blank-image.jpg'); // Define column name directly as a string and set default value
            $table->string('image4')->default('https://st2.depositphotos.com/2586633/46477/v/450/depositphotos_464771766-stock-illustration-no-photo-or-blank-image.jpg'); // Define column name directly as a string and set default value
            $table->string('productName'); // Define column name directly as a string
            $table->string('productDescription'); // Define column name directly as a string
            $table->integer('price'); // Define column name directly as a string
            $table->integer('stockAmount'); // Define column name directly as a string
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
