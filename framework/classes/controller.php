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
 * Base controller class, all other application controllers will extend from this class, provides
 * controllers with the basic features.
 *
 * @package scratch.framework.classes
 * @author Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @copyright Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
class Controller
{
	protected $scratch;
	
	public $actionResult = array();
	
	public function __construct()
	{
		$this->scratch = Scratch::singleton();
	}
	
	public function invokeAction($actionName)
	{
		if (method_exists($this, $actionName))
		{
			$this->actionResult = $this->$actionName();
			
			$this->scratch->dispatchEvent(new ViewEvent(ViewEvent::$RENDER));
		}
		else
		{
			throw new ActionNotFoundException($this, $actionName);
		}
	}
}

?>