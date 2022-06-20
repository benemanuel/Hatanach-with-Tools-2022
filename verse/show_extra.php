<?php
function show_extra($key,$table = 'comment',$raw = 1, $title_string = '<p dir="ltr" lang="en">Extra:</p>',$lookupkey='keyvalue'){
echo "<p debug='function show_extra:". $key ."'></p>";
    if ($key > 1){
     $sqlstring = ' '.$lookupkey.' = ' . $key;
     $value = db_call($sqlstring,$table);
     $loop = $value[0];
     if ($loop > 0) {$answer = $title_string;} else {$answer = "";}
     for ($x = 1; $x <= $loop; $x++) {
          if ($raw == 0)
          { $answer = $answer . $value[$x][3];
          } else {
              $answer = $answer . '<p dir="rtl" lang="he" class="'.$table.'-text-area">' . $value[$x][3]. '</p>'. PHP_EOL;
                }
       }
     return $answer;
     }
    else  return "";
 }


