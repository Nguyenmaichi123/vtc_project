<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Chạy lệnh để cập nhật bảng product.
     */
    public function up() {
        // Xóa bảng cũ
        Schema::dropIfExists('product');

        // Tạo lại bảng product với cột status
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->string('status')->default('available'); // Cột status
            $table->timestamps();
        });
    }

    /**
     * Hoàn tác thay đổi nếu cần rollback.
     */
    public function down() {
        // Xóa bảng product nếu rollback
        Schema::dropIfExists('product');
    }
};
