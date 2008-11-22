<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Scratch application class, main file to bring the framework together
 */
class Scratch
{
	/**
	 * Loader instance
	 * @var Loader
	 */
	public $loader = new Loader();
	
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
		echo 'e';
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