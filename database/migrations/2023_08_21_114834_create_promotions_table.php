<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration {

    public function up() {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('product_code');
            $table->foreign('product_code')->references('product_code')->on('products')->onDelete('cascade');
            $table->json('rules');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('promotions');
    }
}
