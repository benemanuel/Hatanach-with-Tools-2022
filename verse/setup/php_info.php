<?php
xdebug_info();
var_dump( xdebug_info( 'mode' ) );
echo "---------------------------".PHP_EOL;
var_dump(php_ini_loaded_file(), php_ini_scanned_files());
echo "---------------------------".PHP_EOL;
print_r(get_defined_constants());
print_r(get_defined_vars());
print_r(var_dump($GLOBALS),1);



