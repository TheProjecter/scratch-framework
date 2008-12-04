<?php

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