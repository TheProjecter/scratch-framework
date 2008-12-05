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
 * XslViews plugin class, 
 *
 * @package scratch.plugins.xsl-views
 * @author Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @copyright Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
class Serialiser
{
	protected $dom;
	public $ignore = array();
	
	public function __construct()
	{
		$this->dom = new DOMDocument('1.0');
	}
	
	public function serialise($data)
	{
		if (is_object($data))
		{
			$parent = $this->writeParentTag(get_Class($data) , $this->dom);

			$this->serialiseObject($parent, $data);
			
			return $this->dom;
		}
		else if (is_array($data))
		{
			$parent = $this->writeParentTag('array', $this->dom);

			$this->serialiseArray($parent, $data);
			
			return $this->dom;
		}
		
		exit("Serialise Requires data to be type object or string");
	}
	
	protected function serialiseValue($parent, $val, $tagName, $attr = null)
	{
		if (is_object($val))
		{
			if ($tagName != null)
			{
				$parentObj = $this->writeParentTag($tagName, $parent, $attr);
			}
			else
			{
				$parentObj = $this->writeParentTag(get_class($val), $parent, $attr);
			}
			
			if (in_array($tagName, $this->ignore)) return;
			$this->serialiseObject($parentObj, $val, $tagName);
		}
		else if (is_array($val))
		{
			$parentObj = $this->writeParentTag($tagName, $parent, $attr);
			
			if (in_array($tagName, $this->ignore)) return;
			$this->serialiseArray($parentObj, $val, $tagName);
		}
		else
		{
			$this->writeValueTag($parent, $val, $tagName, $attr);
		}
	}
	
	protected function serialiseObject($parent, $obj, $tagName = null)
	{
		$props = get_object_vars($obj);
		
		foreach ($props as $key => $val)
		{
			$this->serialiseValue($parent, $val, $key);
		}
	}
	
	protected function serialiseArray($parent, $array, $tagName = null)
	{
		if (is_array($array))
		{
			foreach ($array as $key => $val)
			{
				$attr = null;
				
				if (!is_int($key))
				{
					$attr = array('name' => $key, 'type' => getType($val));
				}
				
				$key = get_class($val) != null ? get_class($val) : is_int($key) ? gettype($val) : $key;
				
				$this->serialiseValue($parent, $val, $key, $attr);
			}
		}
	}
	
	protected function writeParentTag($tagName, $parent, $attr = null)
	{
		$tag = $this->dom->createElement(str_replace(' ', '_', strtolower($tagName)));
		
		if ($attr != null)
		{
			foreach ($attr as $key => $val)
			{
				$obj = $this->dom->createAttribute($key);
				$objText = $this->dom->createTextNode($val);
				
				$obj->appendChild($objText);
				$tag->appendChild($obj);
			}
		}
		
		$parent->appendChild($tag);
		
		return $tag;
	}
	
	protected function writeValueTag($parent, $val, $tagName = null, $attr = null)
	{
		if ($tagName == null)
		{
			$tagName = get_class($val);
		}

		if ($tagName == null) return;
		
		$tag = $this->dom->createElement(str_replace(' ', '_', strtolower($tagName)));
		$text = $this->dom->createTextNode($val);
		
		if ($attr != null)
		{
			foreach ($attr as $key => $val)
			{
				$obj = $this->dom->createAttribute($key);
				$objText = $this->dom->createTextNode($val);
			
				$obj->appendChild($objText);
				$tag->appendChild($obj);
			}
		}
		
		$tag->appendChild($text);
		
		$parent->appendChild($tag);
	}
}

?>