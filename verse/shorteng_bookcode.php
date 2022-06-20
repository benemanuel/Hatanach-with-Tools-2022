<?php
function shorteng_bookcode($book){
if (isset($book)) {
echo "<p debug='function shorteng_bookcode:". $book ."'></p>";
$servername = "localhost";
$username = "tanach_user";
$password = "GoFigureThisOutOnYourOwn";
$dbname = "verses";
$table = "booklookup";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }
//echo "<p debug='shorteng_bookcode called:"; print_r($book);  echo "'></p>";

$sqlqwery = 'select book from '.$table.' WHERE shortbook = "'. $book. '"';
if ($result = mysqli_query($conn, $sqlqwery)) {
  $row = mysqli_fetch_assoc($result);
  return $row['book'];
  } else {
    echo "Error: " . $result . " " . mysqli_error($conn). "\n";
    return 0;
  }
  mysqli_close($conn);
} else {echo "<p debug='function shorteng_bookcode called no value'></p>";}
}





