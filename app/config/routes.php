<?php

$routes['default'] = Route::map('{controller}/{action}', 'application', 'index');
$routes['test'] = Route::map('test', 'test', 'index');

?>