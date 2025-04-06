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
        Schema::create('financings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('bank')->nullable();
            $table->string('description')->nullable();
            $table->decimal('interest_rate', 5, 2)->nullable();
            $table->integer('installments')->nullable();
            $table->decimal('monthly_payment', 10, 2)->nullable();
            $table->decimal('down_payment', 10, 2)->nullable();
            $table->integer('paid')->nullable();
            $table->decimal('owed', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financings');
    }
};
