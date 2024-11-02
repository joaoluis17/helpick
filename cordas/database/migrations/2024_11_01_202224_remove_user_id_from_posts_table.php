<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUserIdFromPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Verifica se a coluna existe antes de tentar removê-la
            if (Schema::hasColumn('posts', 'user_id')) {
                $table->dropColumn('user_id'); // Remove a coluna se existir
            }
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_user_id_foreign'); // Remove a chave estrangeira
            $table->dropColumn('user_id'); // Remove a coluna
        });
    }

}
