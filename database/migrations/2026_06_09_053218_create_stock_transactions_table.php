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
    Schema::create('stock_transactions', function (Blueprint $table) {
        $table->id();

        $table->foreignId('item_id')
              ->constrained('items')
              ->cascadeOnDelete();

        $table->enum('transaction_type',
        ['in','out','adjustment']);

        $table->integer('quantity');

        $table->integer('balance_after');

        $table->string('reference_no')->nullable();

        $table->date('transaction_date');

        $table->string('operator_name')->nullable();

        $table->text('notes')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_transactions');
    }
};
