#!/bin/bash
echo "" | php -R 'include("index.php");' -B 'parse_str($argv[1], $_GET);' "verse=$1"


