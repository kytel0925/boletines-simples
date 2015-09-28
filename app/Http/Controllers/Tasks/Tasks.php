<?php


namespace App\Http\Controllers\Tasks;


use App\Http\Controllers\Application;

class Tasks extends Application{
	public function getIndex(){
		return "tasks";
	}

}