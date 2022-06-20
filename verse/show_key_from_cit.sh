#!/bin/bash
    request=`eval 'node script/citapp.js -c $1'`
#    echo -n "Request : $request"
#    echo "Answer : $answer"
echo "" | php -R 'include("show_key_from_cit.php");' -B 'parse_str($argv[1], $_GET);' "cit=$1"


