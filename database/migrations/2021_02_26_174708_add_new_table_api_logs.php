<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewTableApiLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_logs', function (Blueprint $table){
            $table->integer('user_id')
                ->nullable(false);

            $table->string('user_agent')
                ->nullable(false);

            $table->string('ip')
                ->nullable(false);

            $table->string('country')
                ->nullable(false);

            $table->string('product')
                ->nullable(false);

            $table->integer('counter')
                ->nullable()
                ->default(null);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_logs');
    }
}
