#!/bin/bash
    request=`eval 'node /var/www/hatanach/verse/script/citapp.js -c $1'`
    echo "Request : $request"
#    echo "Answer : $answer"
echo "" | php -R 'include("citation.php");' -B 'parse_str($argv[1], $_GET);' "verse=$1"


