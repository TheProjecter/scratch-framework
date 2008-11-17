<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Uri helper, provides some basic functions for sanitizing a uri
 */
class UriHelper
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