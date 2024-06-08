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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customerID');
            $table->string('firstName', 80)->nullable();
            $table->string('lastName', 80)->nullable();
            $table->string('password');
            $table->enum('role', ['Customer', 'Admin', 'Vendor'])->default('Customer');
            $table->string('email', 80)->unique();
            $table->timestamp('registrationDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
