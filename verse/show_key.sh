#!/bin/bash
##    request=`eval 'node script/citapp.js -c $1'`
    echo -n "Request : $1"
#    echo "Answer : $answer"
echo "" | php -R 'include("index.php");' -B 'parse_str($argv[1], $_GET);' "key=$1"


