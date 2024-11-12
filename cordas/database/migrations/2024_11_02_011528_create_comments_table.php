<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('comments')) {
            Schema::create('comments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_id')->constrained()->onDelete('cascade');
                $table->foreignId('user_id')->constrained();
                $table->text('content');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
