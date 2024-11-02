<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactionsTable extends Migration
{
    public function up()
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Relaciona a reação à postagem
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relaciona a reação ao usuário
            $table->enum('type', ['upvote', 'downvote']); // Tipo de reação
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('reactions');
    }
}
