<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Launcher
 *
 * @package scratch
 * @author Adam Livesley and Steve Fletcher
 * @copyright Adam Livesley and Steve Fletcher
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