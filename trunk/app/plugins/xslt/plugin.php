<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

$plugin = new Plugin();

// set a few plugin options
$plugin->name = 'XSLT Views';
$plugin->author = 'http://sixones.com/';

// add the helper
$plugin->addHelper('xsl', 'xsl_helper.php');

// add the manager
$plugin->addManager('xsl', 'xsl_manager.php');

?>