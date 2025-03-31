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
        Schema::create('table_controls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Revenues
            $table->string('revenue_description')->nullable();
            $table->decimal('revenue_value', 10, 2)->nullable();

            // Expenses
            $table->string('expense_description')->nullable();
            $table->decimal('expense_value', 10, 2)->nullable();

            // Assets
            $table->decimal('actions', 10, 2)->nullable();
            $table->decimal('fixed_income', 10, 2)->nullable();

            // Debts
            $table->string('debt_item')->nullable();
            $table->string('debt_installments')->nullable();
            $table->decimal('debt_value', 10, 2)->nullable();

            // Credit Cards
            $table->string('credit_card_card')->nullable();
            $table->string('credit_card_description')->nullable();
            $table->string('credit_card_installments')->nullable();
            $table->decimal('credit_card_value', 10, 2)->nullable();

            // Financings
            $table->string('financing_bank')->nullable();
            $table->string('financing_description')->nullable();
            $table->decimal('financing_interest_rate', 5, 2)->nullable();
            $table->integer('financing_installments')->nullable();
            $table->decimal('financing_monthly_payment', 10, 2)->nullable();
            $table->decimal('financing_down_payment', 10, 2)->nullable();
            $table->integer('financing_paid')->nullable();
            $table->decimal('financing_owed', 10, 2)->nullable();
            $table->decimal('financing_total', 10, 2)->nullable();

            // Results
            $table->decimal('payment', 10, 2)->nullable();
            $table->decimal('balance', 10, 2)->nullable();
            $table->decimal('passive_income', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_controls');
    }
};
