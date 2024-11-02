<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Verifique se a coluna já existe antes de adicioná-la
            if (!Schema::hasColumn('posts', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable(); // Pode ser nullable se não quiser um valor padrão
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }

}

