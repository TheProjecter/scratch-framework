<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Route model, used to define a mapping between a url and a controller and action.
 * Optionally, a route can also define a mapping to a particular view
 *
 * @package scratch.framework.models
 * @author Adam Livesley and Steve Fletcher
 * @copyright Adam Livesley and Steve Fletcher
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
class Route extends Model
{
	public $uri;
	public $controller;
	public $action;
	public $view;
	
	/**
	 * Calculates whether the specified uri matches the current Route mappings
	 * @param $uri string
	 * @return bool
	 */
	public function matchesUri($uri)
	{
		if ($this->uri == $uri)
		{
			return true;
		}
		
		$regex = str_replace('{controller}', '[A-Za-z0-9]*', $this->uri);
		$regex = str_replace('{action}', '[A-Za-z0-9]*', $regex);
		
		if (preg_match($regex, $uri, $matches))
		{
			return true;
		}
		
		return false;
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
		$route = new Route();
		$route->uri = $uri;
		$route->controller = $controller;
		$route->action = $action;
		$route->view = $view;
		
		return $route;
	}
}

?>