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
        Schema::create('marketplace_products', function (Blueprint $table) {
            $table->id();
            $table->enum('marketplace_provider', ['tokopedia', 'shopee', 'blibli', 'lazada', 'tiktokshop']);
            $table->string('product_name', 150);
            $table->string('category', 50)->index();
            $table->decimal('price', 15, 2);
            $table->string('product_url', 500);
            $table->string('image_url', 500)->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamp('price_updated_at')->nullable();
            $table->timestamps();

            $table->fullText('product_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketplace_products');
    }
};
