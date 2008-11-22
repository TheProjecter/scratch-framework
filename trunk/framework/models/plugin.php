<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/* 
 * The MIT License
 * Copyright (c) 2008, Adam Livesley and Steve <unknown>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Route model, used to define a mapping between a url and a controller and action.
 * Optionally, a route can also define a mapping to a particular view
 *
 * @package scratch.framework.models
 * @author Adam Livesley and Steve <unknown>
 * @copyright Adam Livesley and Steve <unknown>
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