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
        Schema::table('addstck', function (Blueprint $table) {
            $table->string('recive');
            $table->string('installation'); 
            $table->integer('damage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addstck', function (Blueprint $table) {
            $table->dropColumn('recive');
            $table->dropColumn('installation');
            $table->dropColumn('damage');
        });
    }
};
