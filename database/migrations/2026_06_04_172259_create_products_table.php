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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->string('type_product',50);
            $table->string('description',255)->nullable();
            $table->decimal('selling_price',10,2);
            $table->enum('status', ['active','inactive'])->default('active');

            //?relaciones
            $table->foreignId('unit_measure_id')->constrained('unit_measures')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('recipe_id')->constrained('recipes')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
