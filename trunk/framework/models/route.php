<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Route model, used to define a mapping between a url and a controller and action.
 * Optionally, a route can also define a mapping to a particular view
 */
class Route extends Model
{
	/**
	 * Calculates whether the specified uri matches the current Route mappings
	 * @param $uri string
	 * @return bool
	 */
	public function matchesUri($uri)
	{
		
	}
	
	/**
	 * Creates and maps a route from the specified uri, controller and action.
	 * @param $uri string
	 * @param $controller string
	 * @param $action string
	 * @param $view string
	 * @return Route
	 */
	public static function map($uri, $controller, $action, $view = '')
	{
		
	}
}

?>