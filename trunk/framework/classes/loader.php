<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Loader class, used to load various objects such as models, managers, helpers, controllers, plugins etc..
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