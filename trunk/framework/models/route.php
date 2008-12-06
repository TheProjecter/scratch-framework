<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/* 
 * The MIT License
 * Copyright (c) 2008, Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
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
 * @author Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @copyright Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
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
	
	public $defaultController;
	public $defaultAction;
	public $defaultView;
	
	/**
	 * Calculates whether the specified uri matches the current Route mappings
	 * @param $uri string
	 * @return bool
	 */
	public function matchesUri($uri)
	{
		// straight up and matches? save's loads of work
		if ($this->uri == $uri)
		{
			return true;
		}
		
		// argh, lets regex it then
		$regex = $this->createRegEx($this->uri);
		
		$paths = split('/', $this->uri);

		// TODO: allow multiple path uris
		$secondRegex = $this->createRegEx($paths[0]);
		
		if (preg_match($regex, $uri, $matches))
		{
			$this->controller = $matches[1];
			$this->action = $matches[2];
			
			return true;
		}
		
		if (preg_match($secondRegex, $uri, $matches))
		{
			$this->controller = $matches[1];
			$this->action = $this->defaultAction;
			
			return true;
		}
		
		return false;
	}
	
	protected function createRegEx($str)
	{
		$regex = str_replace('{controller}', "([a-z]+)", $str);
		$regex = str_replace('{action}', '([a-z]+)', $regex);
		$regex = str_replace('/', '\/', $regex);
		$regex = @"/{$regex}/i";
		
		return $regex;
	}
	
	/**
	 * Gets the current controller from the route, either the controller if it exists or the default controller value
	 * @return string controller name
	 */
	public function getController()
	{
		return $this->controller == '' ? $this->defaultController : $this->controller;
	}
	
	/**
	 * Gets the current action from the route, either the action if it exists or the default action value
	 * @return string action name
	 */
	public function getAction()
	{
		return $this->action == '' ? $this->defaultAction : $this->action;
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
		$route->defaultController = $controller;
		$route->defaultAction = $action;
		$route->view = $view;
		
		return $route;
	}
}

?>