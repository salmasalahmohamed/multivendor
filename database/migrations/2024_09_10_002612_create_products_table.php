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
            $table->id();
            $table->foreignId('store_id')->nullable()
                ->constrained('stores')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('category_id')->nullable()
                ->constrained('categories')->nullOnDelete();
            $table->string('name',500);
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('price')->default(0);
            $table->float('compare_price');
            $table->float('rating');
            $table->json('options')->nullable();
            $table->boolean('feature')->default(0);
            $table->enum('status',['active','archived','draft'])->default('active');
            $table->SoftDeletes();

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
