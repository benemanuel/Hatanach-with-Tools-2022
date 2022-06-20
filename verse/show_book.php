<?php
include_once 'db_bookcall.php';

//gets  key checked via chk_key.php returns $text ($book,$chap,$verse)
function show_book($bookkey,$fieldnumber){
    /* field can be 0,1,2,3,4,5
    0 [$row['fullbook'],
    1  $row['shortbook'],
    2  $row['hebbook'],
    3  $row['tnk'],
    4  $row['sederbook'];
     */
    if (($bookkey >= 1) && ($fieldnumber <6)) {
     $sqlstring = 'book = ' . $bookkey;
     $value = db_bookcall($sqlstring);
     //echo "<p debug='show_book bookkey called:";  print_r(array($bookkey,$fieldnumber,$value[$fieldnumber]));  echo "'></p>";
     return $value[$fieldnumber];
     }
    else  return [""];
 }




