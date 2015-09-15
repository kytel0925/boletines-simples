<?php


namespace App\Http\Controllers;

abstract class Application extends Controller{
	protected $viewsFolder = null;

	public function getViewsFolder(){
		return $this->viewsFolder? : get_class($this);
	}
}