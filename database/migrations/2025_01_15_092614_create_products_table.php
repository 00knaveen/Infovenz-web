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
            $table->unsignedInteger('user_id')->nullable(true);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name', 30);
            $table->enum('product_category', ['electronics', 'fashion', 'home_appliances', 'books', 'sports']);
            $table->integer('price');
            $table->integer('quantity')->default(0);
            $table->string('file');
            $table->string('description');
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
