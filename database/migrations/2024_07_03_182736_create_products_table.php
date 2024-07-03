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
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->integer('stock');
            $table->string('status');
            $table->string('image');
            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->softDeletes();
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_published')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_discounted')->default(false);
            $table->decimal('discount_price', 8, 2)->nullable();
            $table->decimal('discount_percent', 8, 2)->nullable();
            $table->integer('view_count')->default(0);
            $table->integer('order_count')->default(0);
            $table->integer('rating_count')->default(0);
            $table->decimal('rating_value', 8, 2)->default(0);
            $table->integer('review_count')->default(0);
            $table->integer('wish_count')->default(0);
            $table->integer('cart_count')->default(0);
            $table->integer('compare_count')->default(0);
            $table->integer('question_count')->default(0);
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
