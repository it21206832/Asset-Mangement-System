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
        Schema::create('AddStck', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('item_name'); // Name of the stock item
            $table->string('item_code')->unique(); // Unique code for the stock item
            $table->string('item_type');
            $table->integer('quantity'); // Quantity of the stock item
            $table->decimal('price', 8, 2); // Price of the stock item
            $table->date('expiry_date')->nullable(); // Expiry date (if applicable)
            $table->timestamps(); // created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('AddStck');
    }
};
