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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // Corrigido: cria a coluna user_id corretamente
            $table->unsignedBigInteger('user_id')->nullable();

            // Foreign key após a coluna existir
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null');

            $table->string('title');
            $table->string('description')->nullable();
            $table->longText('content')->nullable();
            $table->integer('published');
            $table->string('main_image')->nullable();
            $table->string('url')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_decription')->nullable();
            $table->string('author');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
