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
class KeyValuePair extends Model implements IComparable
{
	public $key;
	public $value;

	/**
	 * Equals method, should compare whether the current object is equal to the specified object
	 * @param $object object object to compare against
	 * @return boolean true if the object matches the current object instance
	 */
	public function equals($object)
	{
		if (instanceof($IComparable))
		{
			if ($this->value == $object->value)
			{
				return true;
			}
		}
		
		if ($this->value == $object)
		{
			return true;
		}
		
		return false;
	}
}

?>