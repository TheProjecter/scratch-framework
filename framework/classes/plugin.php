<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/* 
 * The MIT License
 * Copyright (c) 2008, Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Base plugin class, all other application / framework plugins extend from this class.
 *
 * @package scratch.framework.classes
 * @author Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @copyright Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
abstract class Plugin
{
	public $name;
	public $slug;
	public $author;
	public $uri;
	
	public $controllers = array();
	public $dependancies = array();
	public $helpers = array();
	public $managers = array();
	public $models = array();
	public $routes = array();

	protected $_active = false;
	
	public function __construct()
	{
		$this->setup();
	}
	
	public function __destruct()
	{
		$this->deactivate();
	}
	
	public function setup()
	{
		// for overriding
	}
	
	public function activate()
	{
		$this->_active = true;
	}
	
	public function deactivate()
	{
		$this->_active = false;
	}
	
	public function config($name)
	{
		
	}
	
	public function dependancy($name)
	{
		$this->dependancies[] = $name;
	}
	
	public function helper($name, $basePath = '')
	{
		if ($basePath == '') $basePath = $this->pluginDirectory;
		
		$classRef = new ClassReference();
		$classRef->className = ClassHelper::cleanClassName($name . 'Helper');
		$classRef->classPath = "{$basePath}{$name}_helper.php";
		
		$this->helpers[$name] = $classRef;
	}
	
	public function manager($name, $basePath = '')
	{
		if ($basePath == '') $basePath = $this->pluginDirectory;
		
		$classRef = new ClassReference();
		$classRef->className = ClassHelper::cleanClassName($name . 'Manager');
		$classRef->classPath = "{$basePath}{$name}_manager.php";
		
		$this->managers[$name] = $classRef;
	}
	
	public function model($name, $basePath = '')
	{
		if ($basePath == '') $basePath = $this->pluginDirectory;
		
		$classRef = new ClassReference();
		$classRef->className = ClassHelper::cleanClassName($name);
		$classRef->classPath = "{$basePath}{$name}.php";
		
		$this->managers[$name] = $classRef;
	}
}

?>