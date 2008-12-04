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
 * Plugins manager, handles framework plugins (the loading, management, activation etc..)
 *
 * @package scratch.framework.managers
 * @author Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @copyright Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
class PluginsManager
{
	protected $_plugins;
	
	public function __construct()
	{
		
	}
	
	/**
	 * Loads all the plugins, and prepares them for activation
	 * @return void
	 */
	public function loadFrameworkPlugins()
	{
		try
		{
			$pluginsConf = Scratch::singleton()->loader->config('plugins');
		}
		catch (LoaderConfigNotFound $ex)
		{
			echo 'Skipping plugins';
			return;
		}
		
		foreach ($pluginsConf as $pluginName)
		{
			$plugin = Scratch::singleton()->loader->plugin($pluginName);
			$plugin->setup();

			$this->_plugins[$pluginName] = $plugin;
		}
	}
	
	/**
	 * Activates all the loaded plugins
	 * @return void
	 */
	public function activate()
	{
		foreach ($this->_plugins as $pluginName => $plugin)
		{
			$plugin->activate();
		}
	}
	
	/**
	 * Deactivates all the loaded plugins
	 * @return void
	 */
	public function deactivate()
	{
		foreach ($this->_plugins as $pluginName => $plugin)
		{
			$plugin->deactivate();
		}
	}
}

?>