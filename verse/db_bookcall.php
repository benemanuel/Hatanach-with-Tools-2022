<?php

function db_bookcall($sqlqwery){
    global $debug_flag;
    if ($debug_flag) {echo "<p debug='function db_bookcall'></p>";}

$servername = "localhost";
$username = "tanach_user";
$password = "GoFigureThisOutOnYourOwn";
$dbname = "verses";
$table = "booklookup";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }
$sqlstring = "select * from ". $table. " WHERE ". $sqlqwery;

if ($result = mysqli_query($conn, $sqlstring)) {
  $row = mysqli_fetch_assoc($result);
  return [$row['fullbook'], $row['shortbook'], $row['hebbook'], $row['tnk'], $row['sederbook']];
  } else {
    echo "Error: " . $result . " " . mysqli_error($conn). "\n";
    return [0,0,0,""];
  }
  mysqli_close($conn);
}




