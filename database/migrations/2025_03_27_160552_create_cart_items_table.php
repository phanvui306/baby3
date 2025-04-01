<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('cart_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Nếu user đăng nhập
        $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Liên kết sản phẩm
        $table->integer('quantity')->default(1);
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};
