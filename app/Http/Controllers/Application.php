<?php


namespace App\Http\Controllers;

use App\System\Views;


/**
 * Loads the views with an configurable template folder
 *
 * Class Application
 * @package App\Http\Controllers
 */
abstract class Application extends Controller{
	protected $viewsFolder = null;

	public function __construct(){
		$this->middleware('auth');
	}

	public function getViewsFolder(){
		return $this->viewsFolder? : get_class($this);
	}

	protected function getView($app, array $data = [], array $mergeData = []){
		return Views::application($this, $app, $data, $mergeData);
	}
}