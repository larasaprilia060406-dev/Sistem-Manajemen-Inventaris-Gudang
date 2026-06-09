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
    Schema::create('items', function (Blueprint $table) {
        $table->id();
        $table->string('item_code')->unique();
        $table->string('name');
        $table->string('category')->nullable();
        $table->string('unit')->default('pcs');
        $table->integer('current_stock')->default(0);
        $table->integer('min_stock')->default(10);
        $table->integer('max_stock')->default(100);
        $table->string('location')->nullable();
        $table->text('description')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
