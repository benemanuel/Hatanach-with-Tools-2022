#!/bin/bash
node /var/www/hatanach/verse/script/hebapp.js -t "`./show_verse.sh $1|grep -v "<"|sed -e '/^$/d'`"


