<?php


namespace App\Http\Controllers\Subscribers;


use App\Http\Controllers\Application;

class Lists extends Application{
	public function getIndex(){
		return "App subscribers lists";
	}
}