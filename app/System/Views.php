<?php


namespace App\System;

use App\Http\Controllers\Application;
use Illuminate\Routing\Controller;

abstract class Views{
	private static $configTemplate = 'my.app.views.template';

	public static function application(Application $app, $component, array $data = [], array $mergeData = []){
		$appFolder = $app->getViewsFolder();

		$viewName = config("my.{$appFolder}.views.{$component}", $component);

		$template = config(self::$configTemplate);

		$viewRoute = "{$template}.{$viewName}";

		return view($viewRoute, $data, $mergeData);
	}

	public static function template($component, array $data = [], array $mergeData = []){
		$template = config(self::$configTemplate);
		$viewRoute = "{$template}.{$component}";

		return view($viewRoute, $data, $mergeData);
	}
}