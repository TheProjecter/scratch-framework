<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

$plugin = new Plugin();

// set a few plugin options
$plugin->name = 'xsl views';
$plugin->slug = 'xslviews';
$plugin->author = 'sixones';
$plugin->uri = 'http://scratchframework.com/';

// add the config
$plugin->addConfig('debug');

// add the route
$plugin->addRoute('debug/{action}', Route::map('debug', 'debug', 'displayInformation'));

// add the controller so scratch knows this plugin provides a controller
$plugin->addController('debug');

// add the helper
$plugin->addHelper('debug');

// add the manager
$plugin->addManager('log');

?>