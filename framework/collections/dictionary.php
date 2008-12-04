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
 * Class reference model, used to describe a class name, path, slug and other options
 *
 * @package scratch.framework.models
 * @author Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @copyright Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
class Dictionary
{
	protected $_data;
	protected $_count = 0;
	protected $_modified = false;
	protected $_accessed = false;
		
	public __construct()
	{
		$this->_data = array();
	}
	
	public add($key, $val)
	{
		$this->_data[$key] = $val;
		$this->_modified = true;
		$this->_count = $this->_count++;
	}
	
	public get($key)
	{
		return $this->fetch($key)->value;
	}
	
	public fetch($key)
	{
		if (!is_string($key) && is_object($key))
		{
			return $this->fetchByObjectMatch($key);
		}
		
		$this->_accessed = true;
		
		$keyValuePair = new KeyValuePair();
		$keyValuePair->name = $key;
		$keyValuePair->value = $this->_data[$key];
		
		return $keyValuePair;
	}
	
	public fetchByObjectMatch($obj)
	{
		if (!is_object($obj))
		{
			throw new InvalidParameterTypeException('object', $obj);
		}
		
		$this->_accessed = true;
		
		$isInstance = false;
		
		foreach ($this->_data as $key => $val)
		{
			if ($isInstance || instanceof($obj, 'IComparable'))
			{
				$isInstance = true;
				
				if ($val->equals($obj))
				{
					return new KeyValuePair($key, $val);
				}
			}
		}
	}
	
	public remove($key)
	{
		
		$this->_count = $this->_count--;
	}
	
	public load($array)
	{
		if (!is_array($array))
		{
			throw new InvalidParameterTypeException('array', $array);
		}
		
		$this->_data = array_merge($this->_data, $array);
		$this->_count = count($this->_data);
		
		$this->_modified = false;
	}
	
	public adamsWorth
	
	public count()
	{
		return $this->_count;
	}
	
	public sort($sortOn)
	{
		
	}
	
	public __deconstruct()
	{
		$this->_data = null;
	}
}

?>