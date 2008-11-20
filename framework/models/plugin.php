<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Plugin model, used to define a plugin instance and handle the correct mappings
 */
class Plugin extends Model
{
	public $name
	public $slug;
	public $author;
	public $uri;
	public $updateUri;
	public $path;
	
	protected $_configs = array();
	protected $_helpers = array();
	protected $_managers = array();
	protected $_models = array();
	
	/**
	 * Adds a manager to the plugin instance
	 * @param $uri string
	 * @return void
	 */
	public function addConfig($slug, $path = '', $defaultPath = '')
	{
		if ($path == '')
		{
			$path = "{$slug}_manager";
		}
		
		if ($defaultPath == '')
		{
			$defaultPath = "{$slug}_config";
		}
		
		$classRef = new ClassReference();
		$classRef->className = $slug . 'Helper';
		$classRef->classPath = $path;
		$classRef->defaultPath = $defaultPath;
		$classRef->slug = $slug;
		
		$this->_configs[$slug] = $classRef;
	}
	
	/**
	 * Adds a helper to the plugin instance
	 * @param $uri string
	 * @return void
	 */
	public function addHelper($slug, $path = '')
	{
		if ($path == '')
		{
			$path = "{$slug}_helper";
		}
		
		$classRef = new ClassReference();
		$classRef->className = $slug . 'Helper';
		$classRef->classPath = $path;
		$classRef->slug = $slug;
		
		$this->_helpers[$slug] = $classRef;
	}
	
	/**
	 * Adds a manager to the plugin instance
	 * @param $uri string
	 * @return void
	 */
	public function addManager($slug, $path = '')
	{
		if ($path == '')
		{
			$path = "{$slug}_manager";
		}
		
		$classRef = new ClassReference();
		$classRef->className = $slug . 'Manager';
		$classRef->classPath = $path;
		$classRef->slug = $slug;
		
		$this->_managers[$slug] = $classRef;
	}
	
	/**
	 * Adds a model to the plugin instance
	 * @param $uri string
	 * @return void
	 */
	public function addModel($slug, $path = '')
	{
		if ($path == '')
		{
			$path = $slug;
		}
		
		$classRef = new ClassReference();
		$classRef->className = $slug;
		$classRef->classPath = $path;
		$classRef->slug = $slug;
		
		$this->_models[$slug] = $classRef;
	}
	
	/**
	 * Creates and maps a route from the specified uri, controller and action.
	 * @param $uri string
	 * @param $controller string
	 * @param $action string
	 * @param $view string
	 * @return Route
	 */
	public static function map($uri, $controller, $action, $view = '')
	{
		$route = new Route();
		$route->uri = $uri;
		$route->controller = $controller;
		$route->action = $action;
		$route->view = $view;
		
		return $route;
	}
}

?>