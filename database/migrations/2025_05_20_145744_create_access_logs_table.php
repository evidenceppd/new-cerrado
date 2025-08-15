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
        Schema::create('access_logs', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('resource_type')->nullable(); // 'post', 'page', etc.
            $table->unsignedBigInteger('resource_id')->nullable(); // ID do recurso (ex: post_id)
            $table->string('url'); // caminho acessado
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->decimal('lat', 10, 6)->nullable();
            $table->decimal('lon', 10, 6)->nullable();
            $table->date('date');
            $table->timestamps();

            $table->unique(['ip', 'resource_type', 'resource_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_logs');
    }
};
