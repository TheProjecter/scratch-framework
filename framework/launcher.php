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
 * Launcher
 *
 * @package scratch
 * @author Adam Livesley and Steve <unknown>
 * @copyright Adam Livesley and Steve <unknown>
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */

/**
 * Scratch framework version string
 * @global string|constant
 */
define('SCRATCH_VERSION', '0.2');

require('includes.php');

/**
 * Launcher class, the initial class used to invoke the framework 
 */
class Launcher
{	
	private static $__application;
	
	/**
	 * Invokes the framework, application and object setup.
	 * @return void
	 */
	public static function invoke()
	{
		// find the route
		// invoke the controller
		// invoke the action
		// invoke the view
		self::$__application = new Scratch();
	}
}

/**
 * Invoke the launcher to start the framework
 */
Launcher::invoke();

?>