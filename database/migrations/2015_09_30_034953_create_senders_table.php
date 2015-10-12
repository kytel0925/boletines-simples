<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendersTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up(){
		Schema::create('sender', function (Blueprint $table) {
			$table->increments('id');
			$table->string('alias');
			$table->string('username');
			$table->string('password');
			$table->string('host');
			$table->tinyInteger('maximum_per_day');
			$table->timestamps();
			$table->softDeletes();

			$table->enum('status', ['ready', 'spam', 'busy'])->nullable()->default('ready');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){
		Schema::drop('sender');
	}
}
