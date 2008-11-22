<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Debug helper, provides some basic debugging functions
 *
 * @package scratch.plugins.debug
 * @author Adam Livesley and Steve Fletcher
 * @copyright Adam Livesley and Steve Fletcher
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */
class DebugHelper
{
	public static function getApplicationUri($uri = '')
	{
		if ($uri != '')
		{
			Scratch::singleton->config->set('application_uri', $uri);
		}
		
		return Scratch::singleton->config->get('application_uri');
	}
	
	/**
	 * Cleans the specified uri
	 * @param string uri to be cleaned
	 * @return string clean uri string
	 */
	public static function cleanUri($uri)
	{
		$uri = preg_replace('(\/)*', '/', $uri);
		
		return $uri;
	}
}

?>