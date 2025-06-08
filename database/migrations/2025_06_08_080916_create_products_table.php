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
            $table->string('name'); // Tên sản phẩm
            $table->string('slug')->unique(); // Slug để SEO
            $table->text('short_description')->nullable(); // Mô tả ngắn
            $table->longText('description')->nullable(); // Mô tả chi tiết
            $table->unsignedBigInteger('category_id'); // Danh mục
            $table->unsignedBigInteger('brand_id'); // Nhãn hàng
            $table->string('image')->nullable(); // Ảnh sản phẩm
            $table->decimal('price', 10, 2)->default(0); // Giá tiền
            $table->integer('quantity')->default(0); // Số lượng
            $table->enum('status', ['stock', 'out_of_stock', 'discontinued'])->default('stock');
            $table->timestamps();

            // Foreign key (giả định bạn có bảng categories và brands)
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
