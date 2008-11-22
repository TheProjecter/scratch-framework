<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Scratch application class, main file to bring the framework together
 *
 * @package scratch.framework.classes
 * @author Adam Livesley and Steve Fletcher
 * @copyright Adam Livesley and Steve Fletcher
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
		$this->loader = new Loader();
		
		// what shall we load first?
		$this->
	}
	
	/**
	 * Gets the current instance, if there is no instance a new one is created
	 * @return Scratch
	 */
	public static function singleton()
	{
		if (self::$__instance == null)
		{
			self::$__instance = new Scratch();
		}
		
		return self::$__instance;
	}
}

?>