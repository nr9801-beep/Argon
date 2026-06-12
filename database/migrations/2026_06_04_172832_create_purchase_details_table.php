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
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->decimal('quantity',10,2);
            $table->decimal('unit_price',10,2);
            $table->decimal('subtotal',10,2);

            $table->foreignId('purchase_id')->constrained('purchases')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('ingredient_id')->constrained('ingredients')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['purchase_id','ingredient_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_details');
    }
};
