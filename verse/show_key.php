<?php
//gets  key checked via chk_key.php returns $text ($book,$chap,$verse)
function show_key($key){
    include_once 'db_call.php';

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
    $value = array (0);
    if ($key > 1){
     $raw = 1; //output text
     $answer = 0;
     $firsttime = 0;
     //$sqlstring = 'select * from verse WHERE'
     $sqlstring = ' id = ' . $key;
     $value = db_call($sqlstring,'verse');
         array_push($value,[$row['keyvalue'],$row['hebchap'],$row['hebverse'],$row['book'],
                  $row['bookname'],$row['ch'],$row['vr']]);
         $value[0] = 1;
          //[$value[1][0], $value[1][1],$value[1][2],$pasuk];
     }
    else $value[0] = 0;
    return $value;
}



