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
            $table->string('client_ip')->nullable(false)->comment('クライアントIP');
            $table->text('user_agent')->comment('ユーザーエージェント');
            $table->string('request_url', 255)->nullable(false)->comment('リクエストURL');
            $table->dateTime('request_time', 6)->nullable(false)->comment('リクエスト日時');
            $table->dateTime('response_time', 6)->nullable(false)->comment('レスポンス日時');
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
