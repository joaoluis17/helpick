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
    Schema::table('jobs', function (Blueprint $table) {
        if (!Schema::hasColumn('jobs', 'attempts')) {
            $table->integer('attempts')->default(0);
        }

        if (!Schema::hasColumn('jobs', 'payload')) {
            $table->text('payload');
        }

        if (!Schema::hasColumn('jobs', 'queue')) {
            $table->string('queue');
        }
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn(['attempts', 'payload', 'queue']);
        });
    }
};

