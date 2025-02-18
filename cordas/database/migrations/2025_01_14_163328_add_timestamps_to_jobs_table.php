<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToJobsTable extends Migration
{
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            if (!Schema::hasColumn('jobs', 'created_at')) {
                $table->timestamp('created_at')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }
        });
    }


    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropTimestamps(); // Remove created_at e updated_at
        });
    }
}

