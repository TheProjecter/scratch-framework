<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Route manager, handles all the routing from the url and converts such to a valid Route object
 *
 * @package scratch.framework.managers
 * @author Adam Livesley and Steve Fletcher
 * @copyright Adam Livesley and Steve Fletcher
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
class RouteManager
{
	protected $_routes;
	
	public function __construct()
	{
		
	}
	
	/**
	 * Finds the correct route from the uri
	 * @return Route
	 */
	public function find()
	{
		return $this->findFromUri(UriHelper::cleanUri($_SERVER['REQUEST_URI']));
	}
	
	/**
	 * Finds the correct route from the uri
	 * @param $uri string uri to find the string
	 * @return Route
	 */
	public function findFromUri($uri)
	{
		foreach ($this->_routes as $route)
		{
			if ($route->matchUri($uri))
			{
				return $route;
			}
		}
	}
}

?>