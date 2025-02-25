<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // ID người dùng (nếu có đăng nhập)
            $table->string('email');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->text('address');
            $table->string('city');
            $table->string('payment_method');
            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('pending'); // Trạng thái đơn hàng
            $table->timestamps();

            // Khóa ngoại nếu có bảng users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
