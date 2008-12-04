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
 * Scratch application class, main file to bring the framework together
 *
 * @package scratch.framework.classes
 * @author Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @copyright Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
class Scratch
{
	/**
	 * Loader instance
	 * @var Loader
	 */
	public $loader;
	
	/**
	 * Current route instance
	 * @var Route
	 */
	public $route;
	
	/**
	 * Current controller instance
	 * @var Controller
	 */
	public $controller;
	
	/**
	 * Current instance of this class
	 * @var Scratch
	 */
	private static $__instance;
	
	public function __construct()
	{
		self::$__instance = $this;
		
		set_exception_handler('exceptionHandler');
		
		// setup our loader instance 
		$this->loader = new Loader();

		// load a few helpers
		$this->loader->helper('uri', FRAMEWORK_PATH . 'helpers');

		// loader the plugins
		$this->plugins = $this->loader->manager('plugins');
		$this->plugins->loadFrameworkPlugins();

		// what shall we load first?
		$this->route = $this->loader->manager('route')->find();

		// load the controller
		$this->controller = $this->loader->controller($this->route->getController());
		$this->controller->invokeAction($this->route->getAction());
	}
	
	public function exceptionHandler($ex)
	{
		echo "<br />\n" . $ex->getMessage();
	}
	
	/**
	 * Gets the current instance, if there is no instance a new one is created
	 * @return Scratch
	 */
	public static function singleton()
	{
		if (self::$__instance == null)
		{
			new Scratch();
		}
		
		if (self::$__instance == null) echo 'nulll';
		
		return self::$__instance;
	}
}

?>