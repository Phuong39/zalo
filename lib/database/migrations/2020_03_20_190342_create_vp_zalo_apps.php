<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVpZaloApps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_zalo_apps', function (Blueprint $table) {
            // $table->increments('id');
            // $table->integer('user_id');
            // $table->string('appid');
            // $table->string('app_secret');
            // $table->string('app_name');
            // $table->text('admin_access_token');
            // $table->text('app_auth_link');
            // $table->integer('is_public');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vp_zalo_apps');
    }
}
