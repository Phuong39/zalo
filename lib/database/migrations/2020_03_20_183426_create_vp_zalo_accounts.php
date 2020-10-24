<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVpZaloAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('vp_zalo_accounts', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('zalo_id')->length(32);
        //     $table->integer('user_id')->length(11)->unsigned();
        //     $table->foreign('user_id')
        //           ->references('id')
        //           ->on('vp_users');
        //     $table->string('firstname')->length(255);
        //     $table->string('lastname')->length(255);
        //     $table->text('image');
        //     $table->text('groups');
        //     $table->text('hidden_groups');
        //     $table->text('pages');
        //     $table->text('hidden_pages');
        //     $table->text('friends');
        //     $table->string('defaultApp')->length(64);
        //     $table->string('default_notes_category')->length(64);
        //     $table->string('name')->length(64);
        //     $table->integer('page')->length(11);
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
        Schema::dropIfExists('vp_zalo_accounts');
    }
}
