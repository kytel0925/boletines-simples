<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriberTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
	    Schema::create('subscriber', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('name');
		    $table->string('email');
		    $table->timestamps();
		    $table->softDeletes();

		    $table->index('created_at');
		    $table->enum('status', ['active', 'inactive'])->nullable()->default('active');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
	    Schema::drop('subscriber');
    }
}
