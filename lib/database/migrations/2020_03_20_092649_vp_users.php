<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('vp_users', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('email')->length(32);
        //     $table->string('password')->length(64);
        //     $table->string('salt')->length(32);
        //     $table->string('firstname')->length(32);
        //     $table->string('lastname')->length(32);
        //     $table->string('fbuserid')->length(32);
        //     $table->integer('roles')->length(11);
        //     $table->string('gender')->length(8);
        //     $table->string('act_code')->length(32);
        //     $table->integer('active')->length(11);
        //     $table->dateTime('signup');
        //     $table->text('registered_with');
        //     $table->dateTime('expire_on');
        //     $table->dateTime('last_login');
        //     $table->string('lang')->length(32);
        //     $table->text('avatar');
        //     $table->text('pw_reset_code');
        //     $table->string('timezone')->length(64);
        //     $table->integer('expired');
        //     $table->integer('id_parent'); 
        //     $table->tinyinteger('level');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
