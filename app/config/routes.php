<?php

$routes['default'] = Route::map('{controller}/{action}', 'application', 'default');
$routes['test'] = Route::map('test', 'test', 'index');

?>