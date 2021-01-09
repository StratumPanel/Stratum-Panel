<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateIpAllocationsTable.
 */
class CreateIpAllocationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ip_allocations', function(Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('gateway');
            $table->string('netmask');
            $table->string('mac_address');
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
		Schema::drop('ip_allocations');
	}
}
