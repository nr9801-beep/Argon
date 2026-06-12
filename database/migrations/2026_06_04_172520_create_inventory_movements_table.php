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
        Schema::create('inventory_movements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('movement_type', ['entry','exit']);
            $table->decimal('quantity',10,2);
            $table->dateTime('movement_date')->useCurrent();
            $table->string('description',255)->nullable();

            $table->foreignId('employee_id')->constrained('employees')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('ingredient_id')->constrained('ingredients')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_movements');
    }
};
