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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->string('description',255)->nullable();
            $table->decimal('stock_quantity',10,2);
            $table->decimal('minimum_stock',10,2);
            $table->date('last_purchase_date')->nullable();
            $table->decimal('unit_cost',10,2);
            $table->enum('status', ['active','inactive'])->default('active');

            //?relaciones
            $table->foreignId('supplier_id')->constrained('suppliers')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('unit_measure_id')->constrained('unit_measures')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
