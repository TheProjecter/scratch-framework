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
 * Uri helper, provides some basic functions for sanitizing a uri
 *
 * @package scratch.framework.helpers
 * @author Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @copyright Adam Livesley <sixones.devel@me.com> and Steve F <timedout@12ohms.com>
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
class UriHelper
{
	public static function getApplicationUri($uri = '')
	{
		if ($uri != '')
		{
			Scratch::singleton()->config->set('application_uri', $uri);
		}
		
		return Scratch::singleton()->config->get('application_uri');
	}
	
	/**
	 * Cleans the specified uri
	 * @param string uri to be cleaned
	 * @return string clean uri string
	 */
	public static function cleanUri($uri)
	{
		$uri = self::undoubleSlashes($uri);
		$uri = rtrim($uri, '/');
		$uri = ltrim($uri, '/');
		
		return $uri;
	}
	
	public static function undoubleSlashes($uri)
	{
		return preg_replace('/[\/]+/i', '/', $uri);
	}
}

?>