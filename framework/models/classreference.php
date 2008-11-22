<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Class reference model, used to describe a class name, path, slug and other options
 *
 * @package scratch.framework.models
 * @author Adam Livesley and Steve Fletcher
 * @copyright Adam Livesley and Steve Fletcher
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
class ClassReference extends Model
{
	public $className;
	public $classPath;
	public $slug;
	public $updateUrl;
}

?>