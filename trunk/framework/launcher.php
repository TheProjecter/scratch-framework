<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Scratch framework version string
 * @global string|constant
 */
define('SCRATCH_VERSION', '0.2');

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
		echo 'ee';
		$this->__application = new Scratch();
	}
}

/**
 * Invoke the launcher to start the framework
 */
Launcher::invoke();

?>