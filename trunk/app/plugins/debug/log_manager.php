<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/* 
 * The MIT License
 * Copyright (c) 2008, Adam Livesley and Steve Fletcher
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
 * Log manager provides a logger that can be used in an application, it also enables the logging functionalities in scratch
 * framework and handles the logs.
 *
 * @package scratch.plugins.debug
 * @author Adam Livesley and Steve Fletcher
 * @copyright Adam Livesley and Steve Fletcher
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
class LogManager
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