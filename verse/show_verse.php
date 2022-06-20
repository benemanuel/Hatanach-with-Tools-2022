<?php
function show_verse($key){
    include_once 'db_call.php';
    include_once 'fix_peh_samach.php';

    /*
 DESCRIBE verse;
+--------------+----------+
| Field        | Type     |
+--------------+----------+
| *id           | int(11)  |
| verse        | text     |
| book         | int(11)  |
| ch           | int(11)  |
| vr           | int(11)  |
| last_updated | datetime |
+--------------+----------+
     */
    if ($key > 1){
     $sqlstring = ' id = ' . $key;
     $value = db_call($sqlstring,'verse');
    return [$value[1][0], $value[1][1],$value[1][2],fix_peh_samach($value[1][3])];
     }
    else  return [0,0,0,""];
   }



