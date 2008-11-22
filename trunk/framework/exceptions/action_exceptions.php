<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Action exceptions
 * 
 * @package scratch.framework.exceptions
 * @author Adam Livesley and Steve Fletcher
 * @copyright Adam Livesley and Steve Fletcher
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */

class ActionNotFoundException extends Exception
{
	public function __construct($controllerObject, $actionName)
	{
		$controllerType = get_class($controllerObject);
		
		parent::__construct(@"Action method '{$actionName}' not found on controller instance '{$controllerType}'");
	}
}

?>