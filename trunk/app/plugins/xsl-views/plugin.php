<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

$plugin = new Plugin();

// set a few plugin options
$plugin->name = 'xsl views';
$plugin->slug = 'xslviews';
$plugin->author = 'sixones';
$plugin->uri = 'http://scratchframework.com/';
$plugin->updateUri = 'http://updates.sixones.com/xsl-views/'

// add the config
$plugin->addConfig('xslviews');

// hooks
$plugin->addHook('onRender', 'class.php', 'className', 'action');

// add the helper
$plugin->addHelper('xml');

// add the manager
$plugin->addManager('xsl-creator');

?>