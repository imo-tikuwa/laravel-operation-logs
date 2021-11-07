<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_logs', function (Blueprint $table) {
            $table->id();
            $table->string('client_ip')->nullable(false)->comment('client ip');
            $table->text('user_agent')->comment('user agent');
            $table->string('request_url', 255)->nullable(false)->comment('request url');
            $table->dateTime('request_time', 6)->nullable(false)->comment('request time');
            $table->dateTime('response_time', 6)->nullable(false)->comment('response time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operation_logs');
    }
}
