<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SendersNewFields extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('sender', function(Blueprint $table){
	        $table->smallInteger('max_per_hour')->unsingned()->nullable();
	        $table->enum('protocol', ['ssl', 'tsl'])->nullable();
	        $table->smallInteger('port')->nullable();
        });

	    Schema::table('mailing', function(Blueprint $table){
		    $table->enum('status', ['pending', 'finish', 'working'])->default('pending');
		    $table->string('from_name');
		    $table->string('from_mail');
	    });

	    Schema::create('list', function(Blueprint $table){
		    $table->increments('id');
		    $table->integer('mailing_id')->unsigned();
		    $table->string('name');
		    $table->integer('created_by')->unsigned();
		    $table->enum('status', ['pending', 'finish'])->default('pending');
		    $table->timestamps();
	    });

	    Schema::create('list_member', function(Blueprint $table){
		    $table->increments('id');
		    $table->integer('list_id')->unsigned();
		    $table->integer('subscriber_id')->unsigned();
		    $table->enum('status', ['pending', 'done'])->default('pending');
		    $table->timestamps();
	    });

	    Schema::create('sender_attempt', function(Blueprint $table){
		    $table->increments('id');
		    $table->integer('sender_id')->unsigned();
		    $table->integer('list_member_id')->unsigned();
		    $table->enum('status', ['ok', 'pendding', 'failure']);
		    $table->timestamps();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('sender_attempt');
        Schema::drop('list_member');
        Schema::drop('list');
	    Schema::table('sender', function(Blueprint $table){
		    $table->dropColumn('port');
		    $table->dropColumn('protocol');
		    $table->dropColumn('max_per_hour');
	    });
    }
}
