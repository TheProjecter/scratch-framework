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
 * Activerecord model class, 
 *
 * @package scratch.plugins.activerecord
 * @author Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @copyright Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
class Activerecord extends Model
{
	public $id = 0;
	public $autoLoad = false;
	
	protected $_properties;
	
	public function __construct($id = 0)
	{
		$this->id = $id;
		
		if ($this->id && $this->autoLoad)
		{
			$this->load();
		}
	}
	
	public function save()
	{
		if ($this->id == 0)
		{
			$this->create();
		}
		else
		{
			$this->update();
		}
	}
	
	public function create()
	{
		
	}
	
	public function update()
	{
		if ($this->id == 0) throw new Exception("Trying to update on a model with no id.");
		
		
	}
	
	public function delete()
	{
		if ($this->id == 0) throw new Exception("Trying to delete a model with no id.");
		
		
	}
}

?>