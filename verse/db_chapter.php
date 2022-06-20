<?php
function db_chapter($book_code,$chapter_number) {
    //echo "<p debug='function db_chapter:"; print_r(array($book_code,$chapter_number)); echo "'></p>";


$servername = "localhost";
$username = "tanach_user";
$password = "GoFigureThisOutOnYourOwn";
$dbname = "verses";

$table = "chapter";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }
$sqlwhereqwery="(book = ". $book_code. ") and (ch = ". $chapter_number. ")";
$sqlstring = 'select vr from '. $table.' WHERE '.  $sqlwhereqwery;
if ($result = mysqli_query($conn, $sqlstring)) {
  $row = mysqli_fetch_assoc($result);
  return $row['vr'];
  } else {
    echo "Error: " . $result . " " . mysqli_error($conn). "\n";
    return 0;
  }
  mysqli_close($conn);
}


