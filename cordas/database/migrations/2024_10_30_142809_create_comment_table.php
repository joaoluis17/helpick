<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Cria uma coluna `id` auto-incremental
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade'); // Cria a coluna `post_id` como chave estrangeira
            $table->text('content'); // Cria uma coluna `content`
            $table->timestamps(); // Cria as colunas `created_at` e `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
