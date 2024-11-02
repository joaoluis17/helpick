<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title')->default('')->after('id'); // Adiciona a coluna `title`
            $table->text('content')->default('')->after('title'); // Adiciona a coluna `content`
            $table->unsignedBigInteger('user_id')->after('content'); // Adiciona a coluna `user_id`
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['title', 'content', 'user_id']); // Remove as colunas se a migração for revertida
        });
    }
}
