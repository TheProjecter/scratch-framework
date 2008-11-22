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
 * Loader class, used to load various objects such as models, managers, helpers, controllers, plugins etc..
 *
 * @package scratch.framework.clases
 * @author Adam Livesley and Steve Fletcher
 * @copyright Adam Livesley and Steve Fletcher
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
class Loader
{
	protected static $__loaded = array();
	protected static $__configs = array();
	protected static $__helpers = array();
	protected static $__models = array();
	protected static $__plugins = array();
	
	public function __construct()
	{
		
	}
	
	/**
	 * Loads the specified configuration file and stores the content
	 * @param $name string Name of the configuration file to load
	 * @return boolean returns true when the configuration has been successfully loaded
	 */
	public function loadConfig($name)
	{
		if (in_array($name, self::$__loaded))
		{
			return true;
		}
		
		include(APP_PATH . "config/{$name}.php");
		
		if (isset($$name) && is_array($$name))
		{
			if (isset(self::$__configs[$name]))
			{
				self::$__configs[$name] = array_merge($$name, self::$__configs[$name]);
			}
			else
			{
				self::$__configs[$name] = $$name;
			}
			
			self::$__loaded[] = $name;
			unset($config);
			
			return true;
		}
		
		return false;
	}
	
	/**
	 * Loads the specified manager and returns the instance
	 * @param $name string Name of manager to load
	 * @return object returns the manager instance
	 */
	public function loadManager($name)
	{
		if (!in_array($name, self::$__loaded))
		{
			if (!file_exists(FRAMEWORK_PATH . "managers/{$name}.php"))
			{
				return null;
			}
			
			include(FRAMEWORK_PATH . "managers/{$name}.php");
		}
		
		if (!array_key_exists($name, self::$__managers))
		{
			$className = "{$name}Manager";
			self::$__managers[$name] = new $className(); 
		}
		
		return self::$__managers[$name];
	}
	
	/**
	 * Loads the specified helper
	 * @param $name string Name of manager to load
	 * @return boolean returns true when the helper has been successfully loaded
	 */
	public function loadHelper($name)
	{
		if (in_array($name, self::$__loaded))
		{
			return true;
		}
		
		if (file_exists(APP_PATH . "helpers/{$name}.php"))
		{
			include(APP_PATH . "helpers/{$name}.php");
			
			self::$__loaded[] = $name;
			
			return true;
		}
		
		return false;
	}
}

?>