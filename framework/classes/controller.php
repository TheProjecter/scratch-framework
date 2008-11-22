<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Base controller class, all other application controllers will extend from this class, provides
 * controllers with the basic features.
 *
 * @package scratch.framework.classes
 * @author Adam Livesley and Steve Fletcher
 * @copyright Adam Livesley and Steve Fletcher
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
class Controller
{
	protected $scratch;
	
	public function __construct()
	{
		$this->scratch = Scratch::singleton();
	}
	
	public function invokeAction($actionName)
	{
		if (method_exists($this, $actionName))
		{
			$this->actionResult = $this->$actionName();
		}
		else
		{
			throw new ActionNotFoundException($this, $actionName);
		}
	}
}

?>