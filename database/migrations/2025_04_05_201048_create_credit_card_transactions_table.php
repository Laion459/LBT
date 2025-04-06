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
        Schema::create('credit_card_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('credit_card_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->string('description')->nullable();
            $table->decimal('amount', 10, 2);
            $table->unsignedInteger('installments')->nullable();
            $table->unsignedInteger('installment_number')->nullable();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_card_transactions');
    }
};
