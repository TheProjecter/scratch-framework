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
 * Loader class, used to load various objects such as models, managers, helpers, controllers, plugins etc..
 *
 * @package scratch.framework.clases
 * @author Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @copyright Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
class Loader
{
	protected static $__loaded = array();
	protected static $__configs = array();
	protected static $__controllers = array();
	protected static $__helpers = array();
	protected static $__managers = array();
	protected static $__models = array();
	protected static $__plugins = array();
	
	public function __construct()
	{
		
	}
	
	/**
	 * Loads the specified configuration file and stores the content
	 * @param $name string Name of the configuration file to load
	 * @return array returns true when the configuration has been successfully loaded
	 */
	public function config($name, $basePath = '')
	{
		if ($basePath == '') $basePath = APP_PATH . "config";
		
		if (in_array($name, self::$__loaded))
		{
			return self::$__configs[$name];
		}
		
		if (!file_exists("{$basePath}/{$name}.php"))
		{
			throw new LoaderConfigNotFound($name);
		}
		
		include("{$basePath}/{$name}.php");
		
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
			unset($$name);
			
			return self::$__configs[$name];
		}
		
		return null;
	}
	
	/**
	 * Loads the specified controller and returns the instance
	 * @param $name string Name of controller to load
	 * @return object returns the controller instance
	 */
	public function controller($name, $basePath = '')
	{
		if ($basePath == '') $basePath = APP_PATH . "controllers";
		
		if (!in_array($name, self::$__loaded))
		{
			if (!file_exists("{$basePath}/{$name}.php"))
			{
				return null;
			}
			
			include("{$basePath}/{$name}.php");
		}
		
		if (!array_key_exists($name, self::$__controllers))
		{
			$strName = ucwords(strtolower($name));
			$className = "{$strName}Controller";
			self::$__controllers[$name] = new $className(); 
		}
		
		return self::$__controllers[$name];
	}
	
	/**
	 * Loads the specified helper
	 * @param $name string Name of helper to load
	 * @return boolean returns true when the helper has been successfully loaded
	 */
	public function helper($name, $basePath = '')
	{
		if ($basePath == '') $basePath = APP_PATH . "helpers";
		
		if (in_array($name, self::$__loaded))
		{
			return true;
		}
		
		if (file_exists("{$basePath}/{$name}_helper.php"))
		{
			include("{$basePath}/{$name}_helper.php");
			
			self::$__loaded[] = $name;
			
			return true;
		}

		return false;
	}
	
	/**
	 * Loads the specified manager and returns the instance
	 * @param $name string Name of manager to load
	 * @return object returns the manager instance
	 */
	public function manager($name, $basePath = '')
	{
		if ($basePath == '') $basePath = FRAMEWORK_PATH . "managers";
		
		if (!in_array($name, self::$__loaded))
		{
			if (!file_exists("{$basePath}/{$name}.php"))
			{
				return null;
			}
			
			include("{$basePath}/{$name}.php");
		}
		
		if (!array_key_exists($name, self::$__managers))
		{
			$strName = ucwords(strtolower($name));
			$className = "{$strName}Manager";
			self::$__managers[$name] = new $className(); 
		}
		
		return self::$__managers[$name];
	}
	
	/**
	 * Loads the specified model
	 * @param $name string Name of model to load
	 * @return boolean returns true when the model has been successfully loaded
	 */
	public function model($name, $basePath = '')
	{
		if ($basePath == '') $basePath = APP_PATH . "models";
		
		if (in_array($name, self::$__loaded))
		{
			return true;
		}
		
		if (file_exists("{$basePath}/{$name}.php"))
		{
			include("{$basePath}/{$name}.php");
			
			self::$__loaded[] = $name;
			
			return true;
		}

		return false;
	}
	
	/**
	 * Loads the specified framework helper
	 * @param $name string Name of helper to load
	 * @return boolean returns true when the helper has been successfully loaded
	 */
	public function frameworkHelper($name)
	{
		return $this->helper($name, FRAMEWORK_PATH . "helpers");
	}
	
	/**
	 * Loads the specified framework manager
	 * @param $name string Name of manager to load
	 * @return object returns an instance of the manager
	 */
	public function frameworkManager($name)
	{
		return $this->manager($name, FRAMEWORK_PATH . "managers");
	}
	
	/**
	 * Loads the specified framework model
	 * @param $name string Name of model to load
	 * @return boolean returns true when the model has been successfully loaded
	 */
	public function frameworkModel($name)
	{
		return $this->model($name, FRAMEWORK_PATH . "models");
	}
}

?>