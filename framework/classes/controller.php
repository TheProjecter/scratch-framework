<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Base controller class, all other application controllers will extend from this class, provides
 * controllers with the basic features.
 */
class Controller
{
	protected $scratch;
	
	public function __construct()
	{
		$this->scratch = Scratch::singleton();
	}
	
	
}

?>