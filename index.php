<?php

error_reporting(E_ALL);

/**
 * Base directory path of all application + scratch source files, used to simplify directory settings
 * @global string|constant
 */
define('BASE_PATH', '');

/**
 * Location of the application directory (requires trailing slash)
 * @global string|constant
 */
define('APP_PATH', BASE_PATH . "app/");

/**
 * Location of the scratch directory (requires trailing slash)
 * @global string|constant
 */
define('FRAMEWORK_PATH', BASE_PATH . "framework/");

/**
 * Defines a global SCRATCH constant, allows us to make sure files are not accessed outside of the scratch routing
 * should not be removed or changed, doing so will stop the framework and application from being executed.
 * @global boolean|constant
 */
define('SCRATCH', true);

require_once(FRAMEWORK_PATH . 'launcher.php');

?>