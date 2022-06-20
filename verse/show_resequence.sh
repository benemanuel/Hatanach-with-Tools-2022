#!/bin/bash
node /var/www/hatanach/verse/script/hebapp1.js -q "`./show_verse.sh $1|grep -v "<"|sed -e '/^$/d'`"


