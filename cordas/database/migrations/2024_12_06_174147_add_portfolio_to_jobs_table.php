<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            // Exemplo: Adicionando a coluna portfolio
            $table->string('portfolio')->nullable();
        });
    }

    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            // Verificar se a coluna existe antes de tentar removê-la
            if (Schema::hasColumn('jobs', 'portfolio')) {
                $table->dropColumn('portfolio');
            }
        });
    }

};
