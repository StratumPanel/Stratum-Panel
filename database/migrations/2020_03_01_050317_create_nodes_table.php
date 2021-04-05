<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodesTable extends Migration
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
            $table->integer('currentmemory');
            $table->integer('currentstorage');
            $table->string('daemon_apikey');
            $table->string('proxmox_ip');
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
        Schema::dropIfExists('nodes');
    }
}
