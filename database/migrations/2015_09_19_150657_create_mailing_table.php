<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailingTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
	    Schema::create('mailing', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('created_by')->unsigned();
		    $table->string('code')->unique();
		    $table->string('subject');
		    $table->longText('body')->nullable();
		    $table->timestamps();
		    $table->softDeletes();

		    $table->index('created_at');
		    $table->foreign('created_by')->references('id')->on('user');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
	    Schema::drop('mailing');
    }
}
