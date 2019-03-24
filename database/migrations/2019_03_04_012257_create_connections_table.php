<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnectionsTable extends Migration
{
    public function up()
    {
        $buildTestStructure = env('BUILD_TEST_STRUCTURE');

        if(!$buildTestStructure)
        {
            echo '** The generation of test data is disabled. This migration will be ignored. ** | ';

            return;
        }

        Schema::create('connections', function (Blueprint $table) {
            $table->string('name');
            $table->boolean('on');
            $table->date('creation_time')->nullable(true);
            $table->string('ip');
        });
    }

    public function down()
    {
        Schema::dropIfExists('connections');
    }
}
