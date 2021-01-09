<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('maxmemory');
            $table->integer('maxstorage');
            $table->integer('currentmemory');
            $table->integer('currentstorage');
            $table->string('proxmox_username');
            $table->string('proxmox_password');
            $table->integer('proxmox_port');
            $table->string('proxmox_authtype');
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
        //
    }
}