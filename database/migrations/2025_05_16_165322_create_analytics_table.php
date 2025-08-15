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
        Schema::create('analytics', function (Blueprint $table) {
            $table->id();
            $table->integer('page')->nullable()->comment('1: home, 2:contato');
            $table->unsignedBigInteger('post_id')->nullable();
            $table->foreign('post_id')->references('id')->on('posts')->nullOnDelete();
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->foreign('categorie_id')->references('id')->on('products_categories')->nullOnDelete();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->nullOnDelete();
            $table->integer('deviceType')->comment('1: Mobile, 2: Desktop');
            $table->date('date_analytics_view')->nullable();
            $table->integer('views')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics');
    }
};
