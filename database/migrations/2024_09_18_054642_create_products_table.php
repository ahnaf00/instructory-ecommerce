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
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');

            $table->string('name');
            $table->string('slug');
            $table->string('product_code')->unique();
            $table->unsignedBigInteger('price')->default(0);
            $table->unsignedBigInteger('product_stock')->default(0);
            $table->unsignedBigInteger('quantity')->default(1);
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('additional_info')->nullable();
            $table->string('image')->default('default_product.jpg');
            $table->unsignedSmallInteger('ratings')->default(0);

            $table->timestamps();
            $table->softDeletes();
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
