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
        Schema::create('batch_productions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('production_date');
            $table->integer('quantity_produced');
            $table->decimal('production_cost',10,2);
            $table->text('observations')->nullable();

            $table->foreignId('product_id')->constrained('products')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('employee_id')->constrained('employees')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_productions');
    }
};
