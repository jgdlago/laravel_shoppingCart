<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_price', 10, 2);
            $table->string('promotional_product_codes');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('carts');
    }
};
