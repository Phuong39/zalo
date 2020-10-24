<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('permissions');
            $table->integer('max_pots');
            $table->integer('max_zaloaccount');
            $table->integer('max_comments');
            $table->integer('max_likes');
            $table->integer('join_groups');
            $table->integer('account_expiry');
            $table->integer('upload_videos');
            $table->integer('upload_images');
            $table->integer('max_-upload');
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
        Schema::dropIfExists('roles');
    }
}
