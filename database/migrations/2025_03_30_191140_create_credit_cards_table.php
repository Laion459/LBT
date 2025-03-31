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
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number'); // Consider encrypting this
            $table->date('expiration_date');
            $table->string('cvv');      // Consider encrypting this
            $table->decimal('credit_limit', 10, 2);
            $table->decimal('available_credit', 10, 2);
            $table->decimal('interest_rate', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_cards');
    }
};
