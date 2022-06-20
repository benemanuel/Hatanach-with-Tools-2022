<?php
//gets  key returns ($book,$chap,$verse)
function show_sedarim($key){
    $value = array (0);
    if ($key > 1){
     $table = 'sedarim'; $dbname = 'verses'; $hostname = 'localhost'; $username = 'tanach_user'; $password = 'GoFigureThisOutOnYourOwn';
          $conn = mysqli_connect($hostname, $username, $password, $dbname);
           if (!$conn)
           {
               die("Connection failed: " . mysqli_connect_error());
           }
          
          $sqlstring = 'select * from ' . $table . ' WHERE keyvalue = '. $key;
          $result = mysqli_query($conn, $sqlstring);
          $row = mysqli_fetch_assoc($result);
          mysqli_close($conn);
          array_push($value,[$row['keyvalue'],$row['hebchap'],$row['hebverse'],$row['book'],
                             $row['bookname'],$row['ch'],$row['vr']]);
          $value[0] = 1;
     }
    else $value[0] = 0;
    //echo "<p debug='show_sedarim called:"; print_r($value);  echo "'></p>";
    return $value;
   }


//gets  key chap returns $text ($book,$chap,$verse)
function show_fullsedarim($key){
    $keyvalue_index=0;
    $hebchap_index=1;
    $hebverse_index=2;
    $book_index=3;
    $bookname_index=4;
    $ch_index=5;
    $vr_index=6;

    if ($key > 1){
        $s=show_sedarim($key)[1];
        $sedarbook=$s[$bookname_index];
        $sedarchap=$s[$hebchap_index];
        $table = 'sedarim'; $dbname = 'verses'; $hostname = 'localhost'; $username = 'tanach_user'; $password = 'GoFigureThisOutOnYourOwn';
          $conn = mysqli_connect($hostname, $username, $password, $dbname);
           if (!$conn)
           {
               die("Connection failed: " . mysqli_connect_error());
           }
          $value = array (0); $i=0;
          $sqlstring = 'select * from '.$table.' where hebchap = '.$sedarchap.' AND bookname = "'.$sedarbook.'"';
          $result = mysqli_query($conn, $sqlstring);
          while ($row = mysqli_fetch_assoc($result)) {
              $t=array($row['keyvalue'],$row['hebchap'],$row['hebverse'],$row['book'],
                  $row['bookname'],$row['ch'],$row['vr']);
              array_push($value, $t);
              $i++;
             }
              $value[0] = $i;
              mysqli_close($conn);
              //echo "<p debug='show_fullsedarim called:"; print_r($value);  echo "'></p>";
       return $value;
     }
    else  return [0];
   }



