<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

/**
 * Includes
 *
 * @package scratch
 * @author Adam Livesley and Steve Fletcher
 * @copyright Adam Livesley and Steve Fletcher
 * @license MIT License
 * @version $Id$
 * @link http://scratchframework.com/
 */

require_once('classes/scratch.php');
require_once('classes/loader.php');
require_once('classes/controller.php');
require_once('classes/model.php');

// should exceptions use loader?
require_once('exceptions/action_exceptions.php');

?>