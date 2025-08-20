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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('generic_name')->nullable();
            $table->string('brand')->nullable();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('manufacturer')->nullable();
            $table->string('dosage_form'); // tablet, capsule, syrup, injection, etc.
            $table->string('strength')->nullable(); // 500mg, 10ml, etc.
            $table->text('description')->nullable();
            $table->string('barcode')->nullable()->unique();
            $table->decimal('min_stock_level', 8, 2)->default(0);
            $table->boolean('requires_prescription')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
