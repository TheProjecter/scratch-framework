<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Class reference model, used to describe a class name, path, slug and other options
 */
class ClassReference extends Model
{
	public $className;
	public $classPath;
	public $slug;
	public $updateUrl;
}

?>